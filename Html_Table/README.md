<html>
<head>
<meta content="text/html; charset=ISO-8859-1"
http-equiv="content-type">
<title>css</title>
</head>
<body>
<h1 style="color: rgb(19, 63, 249);">HtmlTable </h1>
Repetitive code is error-prone and dificult to maintain .&nbsp; This
Class is build with components from the PEAR library . It will help an
developer to quicly display data from Mysql into a Html-table . This is
a project in progress , feel free to report any bugs you might find .
Even suggestion are welcome . <br>
<br>
This class was tested on :<br>
<ul>
<li>a local development box that has Wamp2 and
PHP5.3&nbsp; installed .</li>
<li>a Linux box with Centos 5.7&nbsp; - PHP5.2</li>
<li>my webhost with a Linux / Apache 2.0 / PHP 5.2.17<br>
</li>
</ul>
<br>
<br>
<hr style="width: 50%; height: 2px;">
<h3><span style="color: rgb(29, 142, 23);">Requirements : </span></h3>
As this Class is build on PEAR's HTML_TABLE package , you should have
uploaded this modul on your server's library-folder and configured
PHP's include-path . Actualy , you need the following moduls :<br>
<ul>
<li>HTML_Table_Matrix</li>
<li>HTML_Table</li>
<li>HTML_Common</li>
</ul>
In case you don't feel confortable with installing PEAR packages on
your server , I have bundled the nececary modules into the "PEAR"
folder . Upload this folder into your server's "lib" directory . <br>
<br>
<hr style="width: 50%; height: 2px;">
<h3><span style="color: rgb(57, 155, 55);"><span
style="color: rgb(46, 127, 45);">Configurations :</span> </span></h3>
During instantiation of the Class , the constructor demands&nbsp; two
array variables ($somevar = new HtmlTable($array1 , $array2) ) . <br>
<span style="text-decoration: underline;">The firls array has the
following required parameters :</span> <br>
<ul>
<li>db_Host</li>
<li>db_User</li>
<li>db_Passwd</li>
<li>db_Name</li>
<li>tbl_Name : What table's data to  display <br>
</li>
<li>tbl_ColumnOrder&nbsp; : What column of the selected table will be
used for ordering &nbsp; <br>
</li>
</ul>
<span style="text-decoration: underline;">The first array has the
following optional parameters : </span><br>
<ul>
<li>tbl_Border : Default is set to 2<br>
</li>
<li>tbl_CellPadding : Default is set to 3<br>
</li>
<li>tbl_CellSpacing : Default is set to 3<br>
</li>
<li>tbl_Limit&nbsp; : How many rows to display . Default is set to 10
. We can also select a group of rows ie 5,15 (row 5 to 15) <br>
</li>
<li>orderBy : Default is set to "ASC" . Set to "DESC" if this feature
is required <br>
</li>
</ul>
<span style="text-decoration: underline;">The second array takes
the names of the columns&nbsp; of the&nbsp; SQL -table&nbsp; .</span> <br>
<br>
<span style="font-weight: bold; font-style: italic;">Note : </span>While
the order of the parameters is&nbsp; unimportant , the spelling of the
names is important (also case sensitive)&nbsp; . The key-values of the
first array are checked by the Class , if a key-value is provided that
isn't recognized , then an exception error is thrown . The key's of the
second array are not checked , so the developer should be carrefully
with the spelling .<br>
<br>
<hr style="width: 50%; height: 2px;">
<h3><span style="color: rgb(60, 122, 42); font-weight: bold;">Recommendations&nbsp;
: </span></h3>
The Class is build to throw exception errors , if an error might occure
(wrong key-values provided into the first array , no database
connection achived)&nbsp; . Use
the code into "<span style="font-weight: bold;">try - catch</span>"&nbsp;
statements (see example.php) . This is a security feature that protect
your website , if a database connection-error occure , a custom
error-message is displayed instead of sensitive information .
<br>
<br>
<h3 style="color: rgb(61, 105, 30);">Hot to download :</h3>
Clone the code via GIT . If you are not confortable with a GIT-client , use the following link
: https://github.com/tournasdim/PEAR_scripts/zipball/master<br>
<br>
<h3>&nbsp;<span style="color: rgb(26, 124, 42);">Practical example : </span></h3>
The file "example.php" contains two examples . <br>
The final result will produce the following&nbsp; tables :<br>
<h3>First example</h3>
<table border="2" cellpadding="3" cellspacing="3">
<tbody>
<tr>
<td><strong>cust_id</strong></td>
<td><strong>first_name</strong></td>
<td><strong>last_name</strong></td>
<td><strong>country</strong></td>
</tr>
<tr>
<td>1</td>
<td>Joe</td>
<td>Smith</td>
<td>US</td>
</tr>
<tr>
<td>2</td>
<td>Masao</td>
<td>Yasunori</td>
<td>Japan</td>
</tr>
<tr>
<td>3</td>
<td>Hans</td>
<td>Schwartz</td>
<td>Germany</td>
</tr>
<tr>
<td>4</td>
<td>Alex</td>
<td>Smith</td>
<td>England</td>
</tr>
<tr>
<td>5</td>
<td>Tom</td>
<td>Greenfield</td>
<td>US</td>
</tr>
<tr>
<td>6</td>
<td>Jane</td>
<td>Addington</td>
<td>England</td>
</tr>
<tr>
<td>7</td>
<td>Alex</td>
<td>Jones</td>
<td>Canada</td>
</tr>
</tbody>
</table>
<h3>Second example </h3>
<table border="22" cellpadding="3" cellspacing="3">
<tbody>
<tr>
<td><strong>PLAYERNO</strong></td>
<td><strong>BEGIN_DATE</strong></td>
<td><strong>END_DATE</strong></td>
<td><strong>POSITION</strong></td>
</tr>
<tr>
<td>57</td>
<td>1992-01-01</td>
<td>1992-12-31</td>
<td>Secretary</td>
</tr>
<tr>
<td>27</td>
<td>1993-01-01</td>
<td>1993-12-31</td>
<td>Treasurer</td>
</tr>
<tr>
<td>27</td>
<td>1991-01-01</td>
<td>1991-12-31</td>
<td>Treasurer</td>
</tr>
<tr>
<td>27</td>
<td>1990-01-01</td>
<td>1990-12-31</td>
<td>Member</td>
</tr>
<tr>
<td>8</td>
<td>1994-01-01</td>
<td>&nbsp;</td>
<td>Member</td>
</tr>
<tr>
<td>8</td>
<td>1993-01-01</td>
<td>1993-12-31</td>
<td>Member</td>
</tr>
<tr>
<td>8</td>
<td>1991-01-01</td>
<td>1991-12-31</td>
<td>Secretary</td>
</tr>
<tr>
<td>8</td>
<td>1990-01-01</td>
<td>1990-12-31</td>
<td>Treasurer</td>
</tr>
<tr>
<td>6</td>
<td>1993-01-01</td>
<td>&nbsp;</td>
<td>Chairman</td>
</tr>
</tbody>
</table>
<br>
<br>
<br>
</body>
</html>