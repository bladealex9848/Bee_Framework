<?php 

class homeController extends Controller {
  function __construct()
  {
  }

  function index()
  {
    $data =
    [
      'title' => 'Home',
      'bg'    => 'dark'
    ];

    View::render('bee', $data);
  }

  function test()
  {
    echo 'Probando nuestra base de datos<br><br><br>';
    echo '<pre>';
    
    try {

      // SELECT
      $sql = 'SELECT * FROM users WHERE id=:id AND name=:name';
      $res = Db::query($sql, ['id' => 1, 'name' => 'John Doe']);
      print_r($res);

      // INSERT
      $sql = 'INSERT INTO users (name, email, created_at) VALUES (:name, :email, :created_at)';
      $registro =
      [
        'name'       => 'Juanita',
        'email'      => 'juanita@gmail.com',
        'created_at' => now()
      ];
      //$id = Db::query($sql, $registro);
      //print_r($id);

      // UPDATE
      $sql = 'UPDATE users SET name=:name WHERE id=:id';
      $registro_actualizado = 
      [
        'name' => 'Ricarda',
        'id'   => 8
      ];
      //print_r(Db::query($sql, $registro_actualizado));

      // DELETE
      $sql = 'DELETE FROM users WHERE id=:id LIMIT 1';
      //print_r(Db::query($sql, ['id' => 4]));

      // ALTER TABLE
      $sql = 'ALTER TABLE users ADD COLUMN username VARCHAR(255) NULL AFTER name';
      //print_r(Db::query($sql));



    } catch (Exception $e) {
      echo 'Hubo un error: '.$e->getMessage();
    }

    echo '</pre>';
    die;
    View::render('test');
  }

  function flash()
  {
    Flasher::new('Te has registrado con éxito', 'success');
    View::render('flash');
  }

  function gastos()
  {
    View::render('gastos');
  }
}