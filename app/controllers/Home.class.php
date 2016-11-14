<?php
use Gitonomy\Git\Repository;

	class Home extends Controller{
		
		private $meta_title = 'Git Branch Switcher';
		
		public function index()
        {// this is what we call
            
            $repository = new Repository(REPOSITORY_DIR);
            $branches = [];
            foreach ($repository->getReferences()->getBranches() as $branch) {
                $branches[] = $branch->getName();
            }

			$view = 'home'; // set the home view.
			$content_vars = null;
            $content_vars['branches'] = $branches;
			$this->loadView('header',array('meta_title'=> $this->meta_title)); 
			$this->loadView($view,$content_vars);
			$this->loadView('footer');
		}
        
        public function branch()
        {
            $branch = $_POST['branches'];
            $migration = (isset($_POST['migration']))?true:false;
            
            $repository = new Repository(REPOSITORY_DIR);
            $wc = $repository->getWorkingCopy();
            try {
                echo $repository->run('status');
            } catch (Exception $e) {
                //
            }
            
            $migrationCommand = MIGRATION_COMMAND; 
            
            if ($migration) {
                $content = "
                #!/bin/bash \n
                $migrationCommand \n
                exit 1
                ";

                // this hook will reject every push
                try {
                    $hooks = $repository->getHooks();
                    $hooks->set('post-checkout', $content);
                } catch(Exception $e) {
                
                } 
            }
        }
	
	}
