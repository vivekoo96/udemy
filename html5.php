<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action="">
 <p>Placehoder:<input type="text" placeholder="Input your name here"></p>
   <p>Autofocus:<input type="text" autofocus></p>
   <p>AotocompleteOff:<input type="text" autocomplete="off"></p>
   <p>Required:<input type="text" required></p>
   <p>Email:<input type="email"></p>
   <P>Pattern:<input type="text" pattern="[0-9]"></P>
     <datalist id="names">
        <option value="vivek">Vivek</option>
        <option value="madhav">Madhav</option>
        <option value="divya">Divya</option>
        <option value="atul">Atul</option>
         
     </datalist>
   <p>Autocomplete:<input type="text" list="names"></p>
   <p><input type="submit" value="submit"></p>
   </form>
    
</body>
</html>