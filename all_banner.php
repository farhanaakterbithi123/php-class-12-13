<?php   

include './inc/header.php';
include '../database/env.php';
$querry = "SELECT * FROM banners";
 $data = mysqli_query($conn, $querry);

 $banners = mysqli_fetch_all($data, 1);

 //print_r($banners);

?>

<h2>All banners</h2>

<table class="table table-resposive">

<tr>
    <th>#</th>
    <th>Banner Title</th>
    <th>Banner Detail</th>
    <th>Banner Image</th>
    <th>status</th>
    <Th>Action</Th>
</tr>

<?php

foreach ($banners as $key=>$banner) {
    ?>
<tr>
    <td><?=++$key?></td>
    <td><?=$banner['title']?></td>
    <td><?=$banner['detail']?></td>
    <td>
        <img src="<?='../uploads/'.$banner['banner_img']?>" alt="" style="height: 100px;">
    </td>
    <td>
   
    <span class=" badge <?= $banner['status'] == 0 ? 'bg-danger' : 'bg-success' ?>  text-light"> <?= $banner['status'] == 0 ? 'de-active' : 'active' ?> </span>
    </td>
    </td>
          
    </td>
    <td>
        <a href="../controller/banner_status_update.php?id=<?=$banner['id'] ?>" class="btn btn-warning">
        <?= $banner['status'] != 0 ? 'de-active' : 'active' ?>
        
        
        </a>
      <a href="#" class="btn btn-primary"> Edit</a>
       <a href="../controller//banner_delete.php?id=<?=$banner['id'] ?>" class="btn btn-danger Bannerdelete">Delete</a> 
    </td>
</tr>
<?php
}
?>

    
    








</table>

<?php   

include "./inc/footer.php";



?>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>

let deletebtn = document.querySelectorAll(".Bannerdelete")

console.log(deletebtn)

for(i = 0; i < deletebtn.length; i++ ){
  deletebtn[i].addEventListener('click', function(e) {

e.preventDefault();
let url = e.target.href



  Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
   
    window.location = url

    
  }
})

});

}


  
</script>



