<?php session_start(); 
if(isset($_SESSION["sucMsg"]) && trim($_SESSION["sucMsg"])!="")
{?>	
    <div id="msgFadeDiv">
        <table border="0" cellpadding="6" cellspacing="4">
            <tr>
                <td align="center" valign="middle">
                    <table border="0" class="sucDiv">
                        <tr>
                            <td align="center" valign="middle"><img src="images/ok.png" border="0" /></td>
                            <td align="center" valign="middle"><?php echo trim($_SESSION["sucMsg"]); ?></td>
                        </tr>
                    </table>
                </td>                
            </tr>
        </table> 
    </div>   	           
	<?php $_SESSION["sucMsg"] = "";
}
elseif(isset($_SESSION["errMsg"]) && trim($_SESSION["errMsg"])!="")
{?>
	<div id="msgFadeDiv">
        <table border="0" cellpadding="6" cellspacing="4">
            <tr>
                <td align="center" valign="middle">
                    <table border="0" class="errDiv">
                        <tr>
                            <td align="center" valign="middle"><img src="images/err.png" border="0" /></td>
                            <td align="center" valign="middle"><?php echo trim($_SESSION["errMsg"]); ?></td>
                        </tr>
                    </table>
                </td>                
            </tr>
        </table>
    </div>   
	<?php $_SESSION["errMsg"] = "";
}?>
<script type="text/javascript" language="javascript">
	$("#msgFadeDiv").fadeIn(400).fadeOut(400).fadeIn(400);
</script>