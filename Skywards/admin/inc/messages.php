<?php
if(isset($_SESSION["sucMsg"]) && trim($_SESSION["sucMsg"])!="")
{?>	    
	<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td align="center" valign="middle">
				<table border="0" cellpadding="1" cellspacing="4" class="sucMsg">
					<tr>
						<td align="center" valign="middle"><img src="<?php echo ADMIN_IMAGE_PATH; ?>ok.png" border="0" /></td>
						<td align="center" valign="middle"><?php echo trim($_SESSION["sucMsg"]); ?></td>
					</tr>
				</table>
			</td>                
		</tr>
	</table>               
	<?php $_SESSION["sucMsg"] = ""; unset($_SESSION["sucMsg"]);
}
elseif(isset($_SESSION["errMsg"]) && trim($_SESSION["errMsg"])!="")
{?>	
	<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td align="center" valign="middle">
				<table border="0" cellpadding="1" cellspacing="4" class="errMsg">
					<tr>
						<td align="center" valign="middle"><img src="<?php echo ADMIN_IMAGE_PATH; ?>error.png" border="0" /></td>
						<td align="center" valign="middle"><?php echo trim($_SESSION["errMsg"]); ?></td>
					</tr>
				</table>
			</td>                
		</tr>
	</table>   
	<?php $_SESSION["errMsg"] = ""; unset($_SESSION["errMsg"]);
}?>