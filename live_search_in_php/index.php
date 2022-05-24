<?php



?>
<style>
    #live {
        margin-top: 20px;
        width:50%;
        margin: 0 auto;
        /* border: 1px solid gray */
        
    }
    .card{
        width: 450px;;
        box-shadow: 0px 0px 2px 0px gray;
    }
    .card-body{
        padding: 10px;
    }
    input {
        width: 100%;
        box-sizing: border-box;
        padding: 10px 8px;
        border: 1px solid gray;
        box-shadow: none;
        border-radius: 25px;
        color: rgba(0,0,0,.5);
        font-size: 15px; 
    }

    input:focus {
        border: 1px solid green;
        box-shadow: none;
    }
    input[type=submit]{
        border: 1px solid green;
        background-color: green;
        color: white;
        font-size: 15px;
        font-weight: 800;
    }
</style>
<div id="live" style="padding:10px" >
    <div class="card">
        <div style="background-color:green; color:white; padding:15px 5px; font-size:20px; font-weight:800; text-align:center">
            live serarch with php 
        </div>
        <span style="padding:5px; margin-top:20px; text-align: center; width:100%">
            This live search engine search your inputted string. <br> Yoy can see any Bd District name by this.
        </span>
        <div class="card-body">
            <form action="gethint.php" method="POST">
            <input type="search" name="search_key" id="search_key" placeholder="type...."  onkeyup="show_result(this.value)" autocomplete="off">
            <p id="result"> result are placed here </p>
            
            </form>
        </div>
    </div>
	
 </div>



 <script>
     
function show_result (key) {
	let result_display = document.getElementById("result").innerHTML;

    if (key == "" || key == "") {
        document.getElementById("result").innerHTML = "";
    } else {
        var XHR = new XMLHttpRequest();
        XHR.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("result").innerHTML = this.responseText;
            };
        };
        
        XHR.open ("POST", "gethint.php?q="+key, false);
        XHR.send();
    }

};
 </script>


