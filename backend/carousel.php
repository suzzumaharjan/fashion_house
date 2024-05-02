<?php
    require_once "dashboard_nav.php";
    require_once "./core/config.php";
    require_once "./core/carousel(core).php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <div class="col-8 p-3 table-responsive">
        <table class="table table-success table-hover table-bordered border-dark caption-top">
            <caption>Carousel Images</caption>
            <thead>
                <tr>
                    <td>S.N.</td>
                    <td>Image</td>
                    <td>Update</td>
                    <td>Delete</td>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($carousels)){foreach($carousels as $index => $carousel){?>
                <tr>
                    <td><?=$index+1?></td>
                    <td><?=$carousel['name']?></td>
                        
                    <td>
                    <button id="updateBtn_<?=$index?>" type="button" class="btn btn-primary" onclick="updateForm(<?=$index?>,1);"><i class="fas fa-pen-alt"></i></button>
                        <form id="formUpdate_<?=$index?>" action="./core/updateCarousel.php" method="POST" style="display: none;" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?=$carousel['id']?>">
                            
                            <input class="form-control form-control-sm" id="formFileSm" type="file" name="image" multiple required>
	                          
                            <input type="submit">
                            <button id="cancel" onclick="updateForm(<?=$index?>,0);"><i class="far fa-times-circle"></i></button>
                        </form>   

                    </td>
                    <td>
                        <a onclick=" return confirm('Sure Delete?');" href="./core/deleteCarousel(core).php?id=<?=$carousel['id']?>"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
                <?php }}?>
            </tbody>
        </table>
    </div>
    </div>
    <div class="container">
        Preview    
    </div>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        
      <div class="carousel-indicators">
        <?php     if (!empty($carousels)) { foreach($carousels as $index => $carasoul){?>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?=$index?>" class="<?php if($index == 0){echo "active";}?>" aria-current="true" aria-label="Slide <?=$index+1?>"></button>
        <?php }}?>

        <!-- <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button> -->
      </div>
      <div class="carousel-inner">
      <?php     if (!empty($carousels)) { foreach($carousels as $index => $carasoul){?>
        
        <div class="carousel-item <?php if($index == 0){echo "active";}?>">
          <img src="../images/Carousel/<?=$carasoul['name']?>" class="d-block w-100">
        </div>
        <?php }}?>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
     <script src="../script/script.js"></script>   
</body>
</html>