
<html>
<head>
 <title>Firebase Realtime Database Web</title>
 <script src="https://www.gstatic.com/firebasejs/4.9.0/firebase.js"></script>
 <script src="https://www.gstatic.com/firebasejs/5.0.4/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyC-qVRQcTy6mzDYiqMq64kF3Vk8khOkccE",
    authDomain: "assignmentsmemo.firebaseapp.com",
    databaseURL: "https://assignmentsmemo.firebaseio.com",
    projectId: "assignmentsmemo",
    storageBucket: "assignmentsmemo.appspot.com",
    messagingSenderId: "599484667406"
  };
  firebase.initializeApp(config);
</script>
</head>
<body>
 <table>
  <tr>
   <td>Email: </td>
   <td><input type="text" name="email" id="email" /></td>
  </tr>
  <tr>
   <td>Unique Id: </td>
   <td><input type="text" name="id" id="id" /></td>
  </tr>
  <tr>
   <td colspan="2">
    <input type="button" value="Save" onclick="save_user();" />
    <input type="button" value="Update" onclick="update_user();" />
    <input type="button" value="Delete" onclick="delete_user();" />
   </td>
  </tr>
 </table>
 
 <h3>Users List</h3>
 
 <table id="tbl_users_list" border="1">

 </table>


 <script type="text/javascript">
     var fBaseId = '<?php echo $fBaseIdArr[0]; ?>';
     var eamilID = '<?php echo $emailIdArr[0]; ?>';
 </script>
 <script>

  var tblUsers = document.getElementById('tbl_users_list');

  var databaseRef = firebase.database().ref('/tasks/'+fBaseId);
  <?php echo 'databaseRef' ?>

  databaseRef.once('value', function(snapshot) {

	var childKey = snapshot.key;

	var name = snapshot.val().name;
	var email = snapshot.val().email;
	var amount = snapshot.val().amount;
	var currency = snapshot.val().currency;
	var country = snapshot.val().country;
	var invoiceAmt = snapshot.val().invoiceAmt;
	var orderId = snapshot.val().fBaseId;

	if (email == eamilID) {

	var rownum=0;
	var row = tblUsers.insertRow(rownum);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);

    cell1.innerHTML = "Name";
    cell2.appendChild(document.createTextNode(name));

    row = tblUsers.insertRow(rownum+1);	
    cell1 = row.insertCell(0);
    cell2 = row.insertCell(1);
	cell1.innerHTML = "Email";
    cell2.appendChild(document.createTextNode(email));

    row = tblUsers.insertRow(rownum+1);
    cell1 = row.insertCell(0);
    cell2 = row.insertCell(1);
    cell1.innerHTML = "Amount";
    cell2.appendChild(document.createTextNode(amount));

    row = tblUsers.insertRow(rownum+1);
    cell1 = row.insertCell(0);
    cell2 = row.insertCell(1);
    cell1.innerHTML = "Currency";
    cell2.appendChild(document.createTextNode(currency));

    row = tblUsers.insertRow(rownum+1);
    cell1 = row.insertCell(0);
    cell2 = row.insertCell(1);
    cell1.innerHTML = "Country";
    cell2.appendChild(document.createTextNode(country));

    row = tblUsers.insertRow(rownum+1);
    cell1 = row.insertCell(0);
    cell2 = row.insertCell(1);
    cell1.innerHTML = "Invoice Amount";
    cell2.appendChild(document.createTextNode(invoiceAmt));

    row = tblUsers.insertRow(rownum+1);
    cell1 = row.insertCell(0);
    cell2 = row.insertCell(1);
    cell1.innerHTML = "Order Id";
    cell2.appendChild(document.createTextNode(orderId));

    }


    <?php echo "Error";?>
    
  });

  function reload_page(){
   window.location.reload();
  }
  
 </script>
 
</body>
</html>
