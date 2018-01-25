<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/18 0018
 * Time: 14:57
 */
//echo define("J","hello");
// echo  j;
// echo  "<br>";
// echo J;
//echo  "<br>";
////查看比配的字符串 从0开始  打印第一个比配的位置
//$j= strpos("Hello world!","world");
//if($j>0){
//    echo 1;
//}else {
//    echo 0;
//}
////count（array a）计算数组长度
//    echo  "<br>";
//    $cars=array("Volvo","BMW","Toyota");
//    echo count($cars);
//echo  "<br>";
//    $c=count($cars);
//    for($x=0;$x<$c;$x++){
//        echo  $cars[$x];
//        echo  "<br>";
//    }
//
//echo  "<br>";
////字符长度
//    $str="anle";
//    echo strlen($str);
//echo  "<br>";
//
//    //升序排列
// $vv=array(5,2,581,58,15,5);
// sort($vv);
// for($x=0;$x<count($vv);$x++){
//     echo  $vv[$x];
//     echo  "<br>";
// }
//echo  "<br>";
// //直接打印
// function test($name,$avg){
//     echo "我叫".$name."今年".$avg;
// }
//test("ANLE","20");
//
//echo  "<br>";
////打印返回值
//function add($x,$y)
//{
//    $total=$x+$y;
//    return $total;
//}
//echo "1 + 16 = " . add(1,16);
//
//echo  "<br>";
//
//
//
//
//
//
//
//class Person
//{
////下面是人的成员属性，都是封装的私有成员
//    private $name;      //人的名子
//    private $sex;       //人的性别
//    private $age;       //人的年龄
//
//
////__get()方法用来获取私有属性
//    private function __get  ($property_name)
//    {
//        echo "在直接获取私有属性值的时候，自动调用了这个__get()方法<br>";
//        if(isset($this->$property_name))
//        {
//            return($this->$property_name);
//        }
//        else
//        {
//            return("空");
//        }
//    }
//
//
////__set()方法用来设置私有属性
//    private function __set($property_name, $value)
//    {
//        echo "在直接设置私有属性值的时候，自动调用了这个__set()方法为私有属性赋值<br>";
//        $this->$property_name = $value;
//    }
//}
//
//
//$p1=new Person();
////直接为私有属性赋值的操作，会自动调用__set()方法进行赋值
//$p1->name="张三";
//$p1->sex="男";
//$p1->age=20;
//
////直接获取私有属性的值，会自动调用__get()方法，返回成员属性的值
//echo "姓名：".$p1->name."<br>";
//echo "性别：".$p1->sex."<br>";
//echo "年龄：".$p1->age."<br>";
//
//class test{
//    var $name=null;
//    var $age=null;
//    function getName (){
//        echo $this->name."<br>";
//    }
//    function getAge(){
//        echo $this->age;
//    }
//    function  setName($name){
//        $this->name=$name;
//    }
//    function setAge($age){
//        $this->age=$age;
//
//    }
//
//}
//$t = new test();
//$t->setAge(20);
//$t->setName('YAANLE');
//
//$t->getName();
//$t->getAge();
//
//
//echo  "<br>";
//class test1{
//    private $name;
//    private  $age;
//    function  setAge($age){
//        $this->age=$age;
//    }
//    function  setName($name){
//        $this->name=$name;
//    }
//    function getAge(){
//        echo $this->age;
//    }
//    function getName(){
//        echo $this->name;
//    }
//
//}
//$t1 =new test1();
//$t1->setName("JAVA");
//$t1->setAge(20);
//$t1->getName();
//echo  "<br>";
//$t1->getAge();
//echo  "<br>";
//
//
//$conn=mysqli_connect('localhost:3306','root','123456' );
//
//$db=mysqli_select_db($conn,'em') or die("数据库连接失败！" . mysqli_error());
//
//if($db){
//    echo "test链接成功";
//    echo  "<br>";
//}else{
//    echo "链接失败";
//    echo  "<br>";
//}
//echo  "<br>";
//
//
////$k=mysqli_query($conn,'utf-8') or die("设置编码失败！");
//if(mysqli_query($conn,'set names utf8')){
//    echo "设置编码成功！";
//}else{
//
//    echo "设置编码失败！";
//}
////查询
//$sql="select * from em_directory";
//$result = $conn->query($sql);
//if($result->num_rows>0){
//    while($row = $result->fetch_assoc()) {
//        echo "<br> magazineCode: ". $row["magazineCode"]. " - directoryName: ". $row["directoryName"];
//}
//} else {
//    echo "0 results";
//
//}
//////添加
//echo  "<br>";
//$sql_insert = "insert into customer VALUES ('anle0222','123') " or die("插入数据失败！");
//$jc=$conn->query($sql_insert);
////$jc=mysqli_query($conn,$sql_insert);
//if($jc){
//    echo "插入成功！";
//    echo  "<br>";
//}
//$ll="00000000000";
//$sql_delete="delete from customer WHERE c_name='".$ll."'";
//$result = $conn->query($sql_delete);
////$result =mysqli_query($conn,$sql_delete);
//echo $result;
//echo  "<br>";
//if($result>0){
//    echo "删除成功！";
//    echo  "<br>";
//}else{
//    echo "删除失败！";
//    echo  "<br>";
//}
$a=0;
var_dump(empty($a));
//var_dump(is_null($a));
if(empty($a)){
    echo "空";
       echo  "<br>";
}else{
    echo "不空";
    echo  "<br>";
}
//
//
//echo  var_dump(isset($a));
//echo  "<br>";

//$sql="show database";
//$conn=mysqli_connect("localhost:3306","root","123456");
//$qu=mysqli_query($conn,$sql);
//var_dump($qu);
//
//if(null){
//    echo "1";
//}else{
//    echo "2";
//}