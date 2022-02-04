<?php 
    include "inc/header.php"; 
    include "lib/Homepage.php"; 
?>

<?php 
    $home = new Homepage();
?>
<?php 
    if(isset($_GET['id'])){
        $userid = $_GET['id'];
    }

    if(isset($_GET["action"]) == "delete"){
        $deleteCourse = $home->deleteCourse($userid);
    }
?>

<!-- start area  -->
<div class="main-content clear">
    <?php include_once "inc/sidebar.php"; ?>
    <div class="content-area clear float-right">
        <?php
            if(isset($deleteCourse)){
                echo $deleteCourse;
            }
        ?>
        <h2 class="title">All Course <span class="float-right"><a href="course.php">Add course</a></span></h2>
        <table id="dataTable1" class="dataTable" style="margin:20px auto 0px;">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Course Title</th>
                    <th>Button Title</th>
                    <th>Button Link</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $home->getCourseData();
                    if($result){
                        $i=0;
                        foreach($result as $value){
                            $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $value['title']; ?></td>
                    <td><?php echo $value['btntitle']; ?></td>
                    <td><?php echo $value['btnlink']; ?></td>
                    <td>
                        <?php 
                            $status = $value['status'];
                            if($status == true){
                                echo "Published";
                            }else{
                                echo "Unpublish";
                            }
                        ?>
                    </td>
                    <td>
                        <a href="course_edit.php?action=edit&id=<?php echo $value['id']; ?>">Edit</a> ||
                        <?php echo "<a href='course_list.php?action=delete&id=".$value['id']."' onclick='return confirm(\"Are you sure to delete data?\")'>Delete</a>" ?>
                    </td>
                </tr>
                <?php } }?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once "inc/footer.php"; ?>