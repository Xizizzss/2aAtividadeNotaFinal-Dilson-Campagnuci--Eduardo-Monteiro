<?php
include 'database.php';
$result = $db->query('SELECT * FROM books');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Biblioteca do Dilson e do Eduardo</title>
</head>
<body>
    <h1>Livros Catalogados</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Ano</th>
            <th>Ações</th>
        </tr>
        <?php while ($row = $result->fetchArray(SQLITE3_ASSOC)): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['id']); ?></td>
                <td><?php echo htmlspecialchars($row['title']); ?></td>
                <td><?php echo htmlspecialchars($row['author']); ?></td>
                <td><?php echo htmlspecialchars($row['year']); ?></td>
                <td><a href="delete_book.php?id=<?php echo $row['id']; ?>" style="color: red;">Remover livro</a></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <h2>Adicionar um Livro</h2>
    <form action="add_book.php" method="post">
        <label for="title">Título:</label><br>
        <input type="text" id="title" name="title" required><br><br>
        <label for="author">Autor:</label><br>
        <input type="text" id="author" name="author" required><br><br>
        <label for="year">Ano de Publicação:</label><br>
        <input type="number" id="year" name="year" required><br>
       <p></p> <input type="submit" value="Adicionar Livro">
    </form>
</body>
</html>

<head>
<style>
  
  body{
	 background-color:powderblue;
	 text-align: center;
}	

	tr {
	 background-color: yellow;
	 color: black;
	 font-family: Raleway;
	 font-size: 120%;
	 
	 
}	 
	
	 table {
    margin: 0 auto;
    border-collapse: collapse;
    width: 80%;
	 
	
	 
}
  h2  { 
   background-color: green;
	 color: white;
	 font-family: Raleway;
	 font-size: 100%;
	 border-radius: 8px;
	 padding: 5px;
	 border: 2px solid #000;
	 display: inline-block; 
	 padding: 5px;
	 
	
	 
	 
}

  h1  { 
	 background-color: yellow;
	 color: black;
	 font-family: Raleway;
	 font-size: 100%;
	 border-radius: 8px;
	 padding: 5px;
	 border: 2px solid #000;
	 display: inline-block; 
	 padding: 5px;
	 
	
	 
	 
}



  
  input[type="submit"] {
   background-color: grey;
	 color: white;
	 border-radius: 8px;
	 padding: 5px;
}	 
  
  
   label  { 
	 background-color: lightgreen;
	 color: black;
	 font-family: Raleway;
	 font-size: 80%;
	 border-radius: 8px;
	 padding: 5px;
	 border: 2px solid #000;
	 display: inline-block; 
	 padding: 5px;
	 
	
	 
	 
}
  
  input {
	 background-color: white;
	 color: black;
	 font-family: Raleway;
	 font-size: 100%;
	 border: 2px solid #000;
	 border-radius: 8px;
	 padding: 5px;
	 
	
	 
	 
}

  
  
  
  
  
</style>
</head>