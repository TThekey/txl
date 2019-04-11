<!DOCTYPE html>
<html><head>
    <meta charset="utf-8">
    <title>通讯录系统</title>

    <meta name="description" content="Dashboard">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--Basic Styles-->
    <link href="public/static/admin/style/bootstrap.css" rel="stylesheet">
    <link href="public/static/admin/style/font-awesome.css" rel="stylesheet">
    <link href="public/static/admin/style/weather-icons.css" rel="stylesheet">

    <!--Beyond styles-->
    <link id="beyond-link" href="public/static/admin/style/beyond.css" rel="stylesheet" type="text/css">
    <link href="public/static/admin/style/demo.css" rel="stylesheet">
    <link href="public/static/admin/style/typicons.css" rel="stylesheet">
    <link href="public/static/admin/style/animate.css" rel="stylesheet">

</head>
<body>

<div class="main-container container-fluid">
    <div class="page-container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="flip-scroll">
                            <table class="table table-bordered table-hover" id="tb1">
                                <thead class="">
                                <tr>
                                    <th class="text-center">name</th>
                                    <th class="text-center">mail</th>
                                    <th class="text-center">phone</th>
                                    <th class="text-center">sex</th>
                                </tr>
                                </thead>
                                <tbody>
            <?php
            $db = mysqli_connect("localhost", "root", "root") or die(mysqli_error($db));
            mysqli_select_db($db,"dbtest") or die(mysqli_error($db));


            if(isset($_POST['condition'])) {
                $condition = $_POST['condition'];
                $sql='';
                if(isset($_POST['state'])){
                 $state = 'on';
                }else{
                 $state = 'off';
                }

                switch ($condition) {
                    case 1:
                        $sql = "select * from txl";
                        break;

                    case 2:
                        $name = $_POST['name'];
                        if($state == 'on'){
                            $sql = "select * from txl where name like '%$name%'";
                        }else{
                            $sql = "select * from txl where name='$name'";
                        }
                        break;

                    case 3:
                        $mail = $_POST['mail'];
                        if($state == 'on'){
                            $sql = "select * from txl where mail like '%$mail%'";
                        }else{
                            $sql = "select * from txl where mail='$mail'";
                        }
                        break;
                    case 4:
                        $phone = $_POST['phone'];
                        if($state == 'on'){
                            $sql = "select * from txl where phone like '%$phone%'";
                        }else{
                            $sql = "select * from txl where phone='$phone'";
                        }
                        break;
                    case 5:
                        $sex = $_POST['sex'];
                        if($state == 'on'){
                            $sql = "select * from txl where sex like '%$sex%'";
                        }else{
                            $sql = "select * from txl where sex='$sex'";
                        }
                        break;
                }
                $result = mysqli_query($db,$sql);
                while($row=mysqli_fetch_assoc($result))//将result结果集中查询结果取出一条
                {
                    if($row['sex'] == 'M'){
                        $row['sex'] = '男';
                    }else if($row['sex'] == 'F'){
                        $row['sex'] = '女';
                    }
                    echo"<tr><td>".$row["name"]."</td><td>".$row["mail"]."</td><td>".$row["phone"]."</td><td>".$row["sex"]."</td></tr>";

                }
            }

            ?>
                                </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

            <div class="widget-body">
                <div id="horizontal-form">
                    <form class="form-horizontal" role="form" action="txl.php" method="post">
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">姓名</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="name" placeholder="" name="name"  type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label no-padding-right">邮箱</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="mail" placeholder="" name="mail"  type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label no-padding-right">电话</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="phone" placeholder="" name="phone"  type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">性别</label>
                            <div class="col-sm-6">
                                <select name="sex" id="sex">
                                    <option value=""></option>
                                    <option value="M">男</option>
                                    <option value="F">女</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">查询条件</label>
                            <div class="col-sm-6">
                                <select name="condition" id="condition">
                                    <option value=""></option>
                                    <option value="1">全部</option>
                                    <option value="2">姓名</option>
                                    <option value="3">邮箱</option>
                                    <option value="4">电话</option>
                                    <option value="5">性别</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="state" class="col-sm-2 control-label no-padding-right">是否模糊查询？</label>
                            <div class="col-sm-6">
                                <label>
                                    <input class="checkbox-slider colored-darkorange" type="checkbox" id="state" name="state" >
                                    <span class="text"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">查询</button>
                                <button id="add" class="btn btn-default">添加</button>
                                <button id="edit" class="btn btn-default">修改</button>
                                <button id="delete" class="btn btn-default">删除</button>

                            </div>
                        </div>
                    </form>
                </div>

                </div>
                <!-- /Page Body -->
            </div>
            <!-- /Page Content -->
		</div>	
	</div>

	    <!--Basic Scripts-->
    <script src="public/static/admin/style/jquery_002.js"></script>
    <script src="public/static/admin/style/bootstrap.js"></script>
    <script src="public/static/admin/style/jquery.js"></script>
    <!--Beyond Scripts-->
    <script src="public/static/admin/style/beyond.js"></script>
    <script>
            // function approach3(dataArray){
            //     $.each(dataArray,function (index,item) {
            //         var tr;
            //         tr += "<td>" + item.name + "</td>";
            //         tr += "<td>" + item.mail + "</td>";
            //         tr += "<td>" + item.phone + "</td>";
            //         tr += "<td>" + item.sex + "</td>";
            //
            //         $("#tbl").append("<tr>"+tr+"</tr>");
            //     })
            // }

        $("#add").click(function () {
            var name = $("input[name='name']").val();
            var mail = $("input[name='mail']").val();
            var phone = $("input[name='phone']").val();
            var options=$("#sex option:selected");//获取当前选择项.
            var sex=options.val();//获取当前选择项的值.

            $.post("ajaxAdd.php",{name:name,mail:mail,phone:phone,sex:sex},function(data){
                if(data == -1){
                   alert("添加数据失败");
                    return false;
                }
                if(data == 1){
                    alert("添加数据成功");

                }
            });
            return false;

        });

        $("#edit").click(function () {
            var name = $("input[name='name']").val();
            var mail = $("input[name='mail']").val();
            var phone = $("input[name='phone']").val();
            var options=$("#sex option:selected");//获取当前选择项.
            var sex=options.val();//获取当前选择项的值.

            $.post("ajaxEdit.php",{name:name,mail:mail,phone:phone,sex:sex},function(data){
                if(data == -1){
                    alert("修改数据失败");
                    return false;
                }
                if(data == 1){
                    alert("修改数据成功");

                }
            });
            return false;

        });

        $("#delete").click(function () {
            var name = $("input[name='name']").val();

            $.post("ajaxDelete.php",{name:name},function(data){
                if(data == -1){
                    alert("删除数据失败");
                    return false;
                }
                if(data == 1){
                    alert("删除数据成功");

                }
            });
            return false;

        });


        //     var name = $("input[name='name']").val();
        //     var mail = $("input[name='mail']").val();
        //     var phone = $("input[name='phone']").val();
        //     var options1=$("#sex option:selected");
        //     var sex=options1.val();
        //     var options2=$("#condition option:selected");
        //     var condition=options2.val();
        //
        //
        //     $.post("ajaxSelect.php",{name:name,mail:mail,phone:phone,sex:sex,condition:condition},function(data){
        //         approach3(data);
        //     }
        //
        //     return false;
        //
        // });

    </script>
</body></html>