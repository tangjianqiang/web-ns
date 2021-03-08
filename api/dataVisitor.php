<?php
	include './conn2.php';
     
	$datav = (string)$mypost->datav;
	$stime = (string)$mypost->stime;
	$etime = (string)$mypost->etime;
	$sel = (string)$mypost->sel;
	$weix = (string)$mypost->weix;
	$ip = (string)$mypost->ip;

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
    
    if($datav !== '' && $stime === ''&& $etime === '' && $sel === '' && $weix === '' && $ip === ''){     //首次加载
         $sql = "SELECT id,time,wchat,keyword,engine,ip,city,web,url,urls,phone,copy FROM datas".$datav;    
    }
    if($datav !== '' && $stime !== ''&& $etime !== '' && $sel === '' && $weix === '' && $ip === ''){     //只筛选时间段
         $sql = "SELECT id,time,wchat,keyword,engine,ip,city,web,url,urls,phone,copy FROM datas".$datav." WHERE time BETWEEN '$stime' AND '$etime'"; 
    }
    if($datav !== '' && $stime === ''&& $etime === '' && $sel !== '' && $weix === '' && $ip === ''){     //只筛选访问网站
         $sql = "SELECT id,time,wchat,keyword,engine,ip,city,web,url,urls,phone,copy FROM datas".$datav." WHERE web='$sel'"; 
    }
    if($datav !== '' && $stime === ''&& $etime === '' && $sel === '' && $weix !== '' && $ip === ''){     //只筛微信号
         $sql = "SELECT id,time,wchat,keyword,engine,ip,city,web,url,urls,phone,copy FROM datas".$datav." WHERE wchat='$weix'"; 
    }
    if($datav !== '' && $stime === ''&& $etime === '' && $sel === '' && $weix === '' && $ip !== ''){     //只筛ip
         $sql = "SELECT id,time,wchat,keyword,engine,ip,city,web,url,urls,phone,copy FROM datas".$datav." WHERE ip='$ip'"; 
    }
    //重复筛选
    if($datav !== '' && $stime !== ''&& $etime !== '' && $sel !== '' && $weix === '' && $ip === ''){     //筛选时间段、访问网站
       $sql = "SELECT id,time,wchat,keyword,engine,ip,city,web,url,urls,phone,copy FROM datas".$datav." WHERE time BETWEEN '$stime' AND '$etime' AND web='$sel'"; 
    }
    if($datav !== '' && $stime !== ''&& $etime !== '' && $sel === '' && $weix !== '' && $ip === ''){     //筛选时间段、微信号
       $sql = "SELECT id,time,wchat,keyword,engine,ip,city,web,url,urls,phone,copy FROM datas".$datav." WHERE time BETWEEN '$stime' AND '$etime' AND wchat='$weix'"; 
    }
    if($datav !== '' && $stime !== ''&& $etime !== '' && $sel === '' && $weix === '' && $ip !== ''){     //筛选时间段、ip
       $sql = "SELECT id,time,wchat,keyword,engine,ip,city,web,url,urls,phone,copy FROM datas".$datav." WHERE time BETWEEN '$stime' AND '$etime' AND ip='$ip'"; 
    }
    if($datav !== '' && $stime === ''&& $etime === '' && $sel !== '' && $weix !== '' && $ip == ''){     //筛选访问网站、微信号
       $sql = "SELECT id,time,wchat,keyword,engine,ip,city,web,url,urls,phone,copy FROM datas".$datav." WHERE web='$sel' AND wchat='$weix'"; 
    }
    if($datav !== '' && $stime === ''&& $etime === '' && $sel !== '' && $weix === '' && $ip !== ''){     //筛选访问网站、ip
       $sql = "SELECT id,time,wchat,keyword,engine,ip,city,web,url,urls,phone,copy FROM datas".$datav." WHERE web='$sel' AND ip='$ip'"; 
    }
    if($datav !== '' && $stime === ''&& $etime === '' && $sel === '' && $weix !== '' && $ip !== ''){     //筛选微信号、ip
       $sql = "SELECT id,time,wchat,keyword,engine,ip,city,web,url,urls,phone,copy FROM datas".$datav." WHERE wchat='$weix' AND ip='$ip'"; 
    }

    if($datav !== '' && $stime !== ''&& $etime !== '' && $sel !== '' && $weix !== '' && $ip === ''){     //筛选时间段、访问网站、微信号
       $sql = "SELECT id,time,wchat,keyword,engine,ip,city,web,url,urls,phone,copy FROM datas".$datav." WHERE time BETWEEN '$stime' AND '$etime' AND web='$sel' AND wchat='$weix'"; 
    }
    if($datav !== '' && $stime !== ''&& $etime !== '' && $sel !== '' && $weix === '' && $ip !== ''){     //筛选时间段、访问网站、ip
       $sql = "SELECT id,time,wchat,keyword,engine,ip,city,web,url,urls,phone,copy FROM datas".$datav." WHERE time BETWEEN '$stime' AND '$etime' AND web='$sel' AND ip='$ip'"; 
    }
    if($datav !== '' && $stime !== ''&& $etime !== '' && $sel === '' && $weix !== '' && $ip !== ''){     //筛选时间段、微信号、ip
       $sql = "SELECT id,time,wchat,keyword,engine,ip,city,web,url,urls,phone,copy FROM datas".$datav." WHERE time BETWEEN '$stime' AND '$etime' AND wchat='$weix' AND ip='$ip'"; 
    }
    if($datav !== '' && $stime === ''&& $etime === '' && $sel !== '' && $weix !== '' && $ip !== ''){     //筛选访问网站、微信号、ip
       $sql = "SELECT id,time,wchat,keyword,engine,ip,city,web,url,urls,phone,copy FROM datas".$datav." WHERE web='$sel' AND wchat='$weix' AND ip='$ip'"; 
    }
    if($datav !== '' && $stime !== ''&& $etime !== '' && $sel !== '' && $weix !== '' && $ip !== ''){     //筛选时间段、访问网站、微信号、ip
       $sql = "SELECT id,time,wchat,keyword,engine,ip,city,web,url,urls,phone,copy FROM datas".$datav." WHERE time BETWEEN '$stime' AND '$etime' AND web='$sel' AND wchat='$weix' AND ip='$ip'"; 
    }


	$result = mysqli_query($conn,$sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) { 
	        $arr[] = $row;
	    }
	    echo json_encode($arr);
	}else {
	    echo "0";
	}

	$conn->close();
?>   