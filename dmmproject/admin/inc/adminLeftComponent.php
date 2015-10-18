<table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td height="1" align="center" valign="top"  class="topleft"><table width="94%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="9%"><img src="<?php echo ADMIN_IMAGE_PATH; ?>logout.png" alt="" width="13" height="15" border="0"></td>
                <td width="25%"  class="logout"><a href="#" onClick="logOut();">Logout</a></td>
                <td width="28%" align="left"  class="userid">User ID:</td>
                <td width="38%" align="left"  class="userid1"><?php echo $_SESSION["admin_name"]; ?></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="1" align="center" valign="top"  class="menubg mainmenu"><img src="<?php echo ADMIN_IMAGE_PATH; ?>manimenu.png" alt="" width="209" height="19" border="0"></td>
          </tr>
          <tr>
            <td height="1" align="center" valign="top"  class="menubg1 mainmenu"><?php include_once ADMIN_INC_PATH."adminLeftLinks.php"; ?></td>
          </tr>
          <tr>
            <td height="1" valign="bottom"><img src="<?php echo ADMIN_IMAGE_PATH; ?>menubottom.png" alt="" width="211" height="9" border="0"></td>
          </tr>
        </table>