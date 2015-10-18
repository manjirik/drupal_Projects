This module provides archive blocks with following setting.
    *Blocks for specific node type.
    *Block for all node types.
    *Block for collection of node types you specified.
    *Block for a given vocabulary
    *Block for term in a given vocabulary

The archive blocks can be theme using Jquery Menu Module.
For the archive blocks you can set the number of nodes will display under month.

This module depends on views module. 
As views module is not supporting 100% to SQLite and 
i have alter the views query for SQLite. 

-- INSTALLATION --

  Install module like normal

-- CONFIGURATION --

  Visit admin/config/sna/settings setting page.
    * Type of Archive Blocks :
      Field list the type of archive block can to be created. For each checked
      item an archive block will be created i.e if 'All Type' item only 
      checked then a  single archive block will created which achieve all 
      content types. if 'Basic page' and 'Story' is checked then only two 
      archive block will created so if you checked all items then that number 
      of archive blocks will be available in 
      Administration » Structure » Blocks.
    * Content types that inclueded in Custom Archive Block type:
      if "Custom type" is checked in Type of Archive Blocks then select 
      the content that types should be included in Custom type archive block.
    * Create archive block based on taxonomy:
      Select taxnomy term or vocabulary for which an archvie block 
      will be created.
    * Number of items:
      Select the number of node will display in expanded archive. 
      Select 0 to show unlimited.
    * Use Jquerymenu Module:
      Check this box if you want to use Jquerymenu module to theme 
      archive blocks. 

-- CONTACT --

  * Asiq Khan - findme@asiqhere.me
