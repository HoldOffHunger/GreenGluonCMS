<?php

	trait SimpleORMSiteMap {
		public function SetORMSiteMapObject()
		{
			require('../classes/Database/ORMSiteMap.php');
			
			return $this->ormsitemap = new ORMSiteMap([dbaccessobject=>$this->db_access_object]);
		}
		
		public function GetEntrySiteMapCodeCount()
		{
			return $this->ormsitemap->GetEntrySiteMapCodeCount();
		}
		
		public function GetSitemapPages($args)
		{
			return $this->ormsitemap->GetSitemapPages($args);
		}
	}
?>