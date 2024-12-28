<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
      <?php
      $arr = [
        'ali',
        'khalid',
        'yaseen',
        'shahid'
      ];
      
    // echo count($arr).'<br>';
    //   associative array
    $assoc_array =[
        [
            "name"=>"ali",
            "age"=>23,
            "qualification"=>"mscs"
        ],
        [
            "name"=>"shahana",
            "age"=>20,
            "qualification"=>"intermediate"
        ],
        [
            "name"=>"asad",
            "age"=>20,
            "qualification"=>"intermediate"
        ],
    ];
    // echo $arr[0];
    // print_r($arr);
    // var_dump($assoc_array)
      ?>
      <ul>
        <?php
        for($i=0;$i<count($arr);$i++){
            ?>

            <li>
                <?php echo $arr[$i]?>
            </li>

            <?php
        }
        ?>
      
      </ul>
      <div
        class="table-responsive container"
      >
        <table
            class="table table-primary"
        >
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Qualification</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($assoc_array as $values){
                    ?>
                    
                    <tr class="">
                    <td scope="row"><?php echo $values['name'] ?></td>
                    <td><?php echo $values['age']?></td>
                    <td><?php echo $values['qualification']?></td>
                </tr>
                    
                    <?php
                }
                ?>
             
              
            </tbody>
        </table>
      </div>
      
    </body>
</html>
