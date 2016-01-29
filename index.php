<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);


$RTL_languages      = array_map('strtolower', array('ar','arc','bcc','bqi','ckb','dv','fa','glk','he','lrc','mzn','pnb','ps','sd','ug','ur','yi') );
$Allowed_extensions = array_map('strtolower', array() );
$lang               = 'en';

$AnyFile            = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABU0lEQVQ4jZWTTYrCQBBG+0heJlOXcCcirmKDVzAgLuNyQNCoo4JHyD5uxIW71M8NvlmkY+LIRCz46N68V1U07ebz+bf3Hp9kMpl8ubq89/i0vPd4EZRl+QiXjJIZ3I4wWOS9oA2ICEQEzBLu3CHgNiwQDgkS0er8V8BBINICVaAiUNWQTgFDWKruIpAAWYiqQU07BNLeu+5oUKtSFAWICPf7vWMCeR7Z1GBmuFwqOM9zEBHiOH4V1HurCNQauGjBq9UKcRyDiDAcDnt/VqhGF1WYGVT1MXae51iv19hsNkjTFP1+v5E8CwQqCrWqew1vt1vsdjvs93ukaYrBYIDRaAQiQrNCLaifzBS32w1EhMPhgOPxiNPphCRJsFgsQESIoqj39i9cr1cQEc7nM7IsQ5IkDeycc7PZLHv3+8bjMYgIy+USRITpdPrjPq0oinpPnUP9Ai83zzxqvvE5AAAAAElFTkSuQmCC';
$CloseFolder        = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACLElEQVQ4jaXS32tSYQDG8QP9SfM4110XY44RCOGVsKvOUQ+YoRdTL4bRaoQ62miFOKq5952pR7HpPNOxNeGcxKCkOZlzCiItc5OKYNHvp4uRrVY56IHP7ffqYZj/ncvluudwODq/czqdTbvdzvYMjI2NvS0UCsjn81AUBbIsQ5ZlpFIp2O32JzabTfOD2WzWWK1WVq/Xn+kGbDbbG0VRkEgkEIvFEI1GEYlEIIoifD7fodfrfefxeLrcbvd7QRAmugGLxfI6l9uAKIqIRCIIhUKglIIQAkIIRFFEOp1GJpPB6uoqgsEgBEEIdwOCIHTW1tZwzrIINU9PYHnyCxX3U7+JNhiO4w4kSQLLU6yX9vFo68j6caX2CSvFV+i7SL8xo6Oj7WQyCZYnyJX3MZ3aPbJ8ZOYPbq/UIBVb6OMXvjIGg6Edj8ehNlLI2we4JdV6mk5VkX76EixHvzB6vb4VDoeh5gkeVzrwZ+t/NSvVMLVUhSexg5ViCyxPPzM6nW6PUoJ+I8X6ZhuBbB3+TB2z6RpmlndxM1nF1NIObsQrmIxtYzK2DU+igoeFPah48okZGRl5MT8/D42JIiw3ceVBGS5S+qfx0BbmsnWoOPqRGRoaagYCAWiMBNeiZVyaewZLD5fvFjERLUPF0w/M8PBww+/3Y8BEMb5YgmNhsycnKcFFn0PFk0NGq9U2HNfv4KyZQnc1e2qDjiWwHN1gBs9fuH/8XafF8gtttXFx4Dv4m2VnA2TEswAAAABJRU5ErkJggg==';
$OpenFolder         = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACeklEQVQ4jaXM70sTAQDG8eudf0z0pvwFvehNzCGUb3wREx3k6Xk6IVF0e5FLSgJNadqLebf70d153m0e07lNrNXEO5yr9EVq6iTNbMOUCnoh5ejpRTSpDIke+Lx8vgTxv/N4PHxXV9fB79xu9057e3vpqYHOzs5PCwsLmJ+fh2VZME0TpmlicnISHR0dj71eb9FPTqezyOl0FhEEcaYQaGtr+2hZFsLhMMbHxxEMBqHrOnRdh8fj+dzS0pJvbm7O0zSdp2k639TUlG9tbV0qBFwu14fZ2SRCoRB0XYeqqlAUBbIsQ9M0zMzMwLIspFIppNNpJJNJkCR5VAjQNH2QSCSgaRpGR0chSRJEUYQgCOB5HjzPQxAEiKIISZIgSRLq6uq+FgIkSe7H4/HCWRAEBAIBsCwLhmEwMjIChmHAsiw4jgPHcXA4HMeB2travUgkAkmSYL+hoJw6XWmDhBJSPiyl1FXC4XDsGYYBQRBQRimYep5FfDH3w1IO8cXsiSbSuzhfr3wjqqurc5qmgeM4lFMynrzcgy+Wwf1oBr5oBr7Yr4ZiGTyY3kTkWRbFpJInqqqq3imKDJZlcZFWMLvyHsPxzb8aiGyg11hD9EUWxQ3KEVFZWbkriiIYhsEl1xjMV/tgHr3+w3BsE33hddw11nBvYgPTSzlcIJUvhM1m22EYBoPDDK66DRipXQxFM/BNZdAfXsed0Cq6x5ZxUz3Wo6/g4dMtlDTIh4Tdbt/2+/2gvDyowQQCiS30hdfRo6/glnay28FV9AaXUdaoviEqKuzbdLcf5ZQC5+AcagZMXOufO5XNPYXiRpknLl+pUS+QMv5ZvfT23HX27He7uFba8uCqWwAAAABJRU5ErkJggg==';
$Loading            = 'data:image/gif;base64,R0lGODlhHwAfANUAAP///5qamiYmJuTk5Ly8vMzMzKqqqrCwsKKioujo6NTU1Pb29qioqKCgoK6urtLS0tzc3NjY2Li4uObm5nBwcMbGxmhoaEZGRkhISDIyMvj4+Pr6+lBQUDY2NsTExFZWVpKSkgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAAKAAAAIf8LTkVUU0NBUEUyLjADAQAAACwAAAAAHwAfAAAG/0CAcEhMPAgOBKDDoQQKxKh0CJEErleAYLu1HDRT6YCALWu5XEolPIwYymY0GmNgAxrwuJybCUcaAHlYZ3sCdxFRA28BgVgHBQMLAAkeIB9ojQYDRGSDAQwKYRsIF4ZlBFR5AJt2a3kQQlZlDBN2QxMMcBKTeaG2Qwp5RnAHv1EHcEdwUMZDBXBIcKzNq3BJcJLUAAtwStrNCNjf3GUIDtLfA9adWMzUz6cPxN/IZQ8JvdTBcAkAsli0jOHSJQSCqmlhNr0awo7RJ19TFORqdAXVEEVZyjyKtG1AgXoZA2iK8oeiKkFZGiCaggelSTiA2LhxidLASjZjBL2siNBOFQ84LyXA+mYEiRJzBO7ZCQIAIfkEAQoAIQAsEAAAAA8ADwAABldAhIPwSISOyGRguZRAAEkkc0oYREPTqSESzU4bXe8ylDEgF4PCYRoSCDCVKEDBCLTdAormasXjD1chFRd+AhaBIQiFAgWBGx+FdoEghRSIHoUciAmFHUEAIfkEAQoAIQAsFgAFAAkAFQAABlnAkDDUiAyHgYBhcEwmCQCh0wkJTRjTgESoyAYSIcAh+xAWsgThIOsQLrKIo1yYENjtHaHnbucIQXwCFCEbH4EBIQiBAgUVF4EWQosHQ3wUGkd2GBVzGQZDQQAh+QQBCgAhACwQABAADwAPAAAGWcCQcChcBI5HBJE4QB4dy2HBGSBEQ4AD9XFVUAOJ6IRBlUQroS+EuEFcBGkkARBKeEAfgR5+NAyEe4F6IQ0RQ4KBGUuIehgGi4gUaJB7FgcaVx0cFAEFV0NBACH5BAEKACEALAUAFgAVAAkAAAZUwJAwVBkajYOjUHBBbJQhgIIROAqugg/IkwgtBoVDYFxdYs+CEHk9DmXQZzWb3DBg4Ff53BAhUvB6awRJQhoHFmiBARIQAFAFARQcHSEIDgQPXUZBACH5BAEKACEALAAAEAAPAA8AAAZZwI5gOEyEjsgjhzj0JJMUpgD0RAakn001VJAKENuQRXqpbA/e0KCqiRJDAYYC8KxghvCA/lAYLJAGGXl6hHpPDYWJTxEGiYRVAwSOAVsAEBKKYSEJDwQOCEEAIfkEAQoAIQAsAAAFAAkAFQAABlnAkNCQERpDFYxAcNRQlkvjAQoVWqiCS6WAFSBCAexnE3pSQUIO1iPsYBPHuBARqNcXQoe9PhAS9gEFQg+ABwAhCYABCkISgAwTIRCKQgB/dkcDBnVyEQ1HQQAh+QQBCgAhACwAAAAADwAPAAAGWMCQcEgsBCicDnGoOVgEUOgyVKFEr0sD5oolZrjdUKQRAkeFA0MgUI5+QJ5ECEBYr8sXxIYIsdupUxJ+AQwTUwmDAQpTIQ+DBwCMdX4FjCEOgwOWCIMLlkEAOw==';

$directory          = (isset($_GET['dir'])) ? $_GET['dir'] : './';
if(isset($_GET['listFolderFiles'])) {die(listFolderFiles($directory));} 



function listFolderFiles($dir){
	global $Allowed_extensions;
    $files = scandir($dir);
    echo ' <ul>';
    foreach($files as $file){ 
        if($file != '.' && $file != '..' &&  ( in_array(  pathinfo($file, PATHINFO_EXTENSION )	, $Allowed_extensions  ) || count($Allowed_extensions) ==0 )  ){
            echo '<li><a href="'.$dir.'/'.$file.'">'.$file;
            if(is_dir($dir.'/'.$file)) listFolderFiles($dir.'/'.$file);
            echo '</a></li>';
        }
    }
    echo '</ul>';
}

?>
<!DOCTYPE html>
<html lang="en-US">
    <head>	
	    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<script src="./js/jquery-2.1.3.min.js"></script>
	    <link href="./css/bootstrap.min.css" rel="stylesheet">
		<script src="./js/bootstrap.min.js"></script>
		<link href="<?php echo $FolderIcon;?>" rel="icon" type="image/x-icon" />
		<title>TreeView</title>
        
		<style>


.CloseFolder{background:url(  <?php echo $CloseFolder;?>) no-repeat left center;padding: 15px 0 15px 20px;margin-left: 5px;}
.OpenFolder{background:url(  <?php echo $OpenFolder;?>) no-repeat left center;padding: 15px 0 15px 20px;margin-left: 5px;}
.AnyFile{background:url(  <?php echo $AnyFile;?>) no-repeat left center;padding: 15px 0 15px 20px;margin-left: 5px;}
.Loading{background:url(<?php echo $Loading;?>) no-repeat center center; padding: 25px ;}

.treeview, .treeview ul {margin:0;padding:0;list-style:none;color: #337ab7;}
.treeview ul { margin-left:1em;position:relative}

.treeview li {margin:0;padding:0 1em;line-height:2em;position:relative}
<?php if( in_array( $lang, $RTL_languages  ) ) { ?>
.treeview ul:before {content:"";display:block;width:0;position:absolute;top:0;right:0;border-right:1px solid;bottom:15px;}
.treeview ul li:before {content:"";display:block;width:10px;height:0;border-top:1px solid;margin-top:-1px;position:absolute;top:1em;right:0}
 body {direction: rtl;}
<?php } else {?>
.treeview ul:before {content:"";display:block;width:0;position:absolute;top:0;left:0;border-left:1px solid;bottom:15px;}
.treeview ul li:before {content:"";display:block;width:10px;height:0;border-top:1px solid;margin-top:-1px;position:absolute;top:1em;left:0}
<?php } ?>
		</style>
    </head>
    <body>


<div class="container">





		

 <div class="modal fade" id="treeView" role="dialog">
    <div class="modal-dialog"> 
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Treeview</h4>
        </div>
        <div class="modal-body">
            <ul class="treeview" id="listFolderFiles"> </ul>		
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
      
    </div>
  </div>


			
<script type="text/javascript">
		
$.fn.extend({
    treed: function (o) {
      
      var openedClass = 'OpenFolder';
      var closedClass = 'CloseFolder';
      var anyClass    = 'AnyFile';
      if (typeof o != 'undefined'){
        if (typeof o.openedClass != 'undefined'){
        openedClass = o.openedClass;
        }
        if (typeof o.closedClass != 'undefined'){
        closedClass = o.closedClass;
        }
		 if (typeof o.anyClass != 'undefined'){
        anyClass = o.anyClass;
        }
      };
      
        //initialize each of the top levels
        var tree = $(this);
        tree.addClass("tree");
        tree.find('li').has("ul").each(function () {
            var branch = $(this); //li with children ul
            branch.prepend("<i class='indicator " + closedClass + "'></i>");
			
            branch.addClass('branch');
            branch.on('click', function (e) {
                if (this == e.target) {
                    var icon = $(this).children('i:first');
                    icon.toggleClass(openedClass + " " + closedClass);
                    $(this).children().children().toggle();
				//	$(this).prepend("<i class='indicator " + anyClass + "'></i>");
					
                }
            })
            branch.children().children().toggle();
			
        });
		
        //fire event from the dynamically added icon
      tree.find('.branch .indicator').each(function(){
        $(this).on('click', function () {
            $(this).closest('li').click(); 
        });
      });
        //fire event to open branch if the li contains an anchor instead of text
        tree.find('.branch>a').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
				 
            });
        });
        //fire event to open branch if the li contains a button instead of text
        tree.find('.branch>button').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();	
            });
        });
    }
});

		
	/*************************************************************/	
		

			 
			 function getContent(dir) 
			 { 
			  
			   $("#listFolderFiles").html('<li><center><span class="Loading"></span><br>Loading</center></li>');			   
			   $.get("?listFolderFiles&dir="+dir, function(data){
			   $("#listFolderFiles").html(data);
			   $('.treeview').treed();

			   });
			 
             };
			 
			 
		$('#treeView').modal('show');	
		getContent('./../');

        </script>
		</div>
    </body>
    </html>