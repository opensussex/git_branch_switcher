<?php
/*
 * The Cache Class - this will be a class that deals with a variety of different caching methods.
 * 
 */

 class BasicCache{
 
    private $cache_directory = null;
    private $cached_time = null; // we want cache time of an hour.
    
    public function __construct($cache_directory, $cached_time = null){
        $this->cache_directory = $cache_directory;
        $this->cached_time = $cached_time;
    }  
    
    public function retrieveCachedFile($cached_file_name, $cached_time = null,$delete=false){
        /*
         * This method will check to see if a file exists and is still in the cached_time window 
         * if it is it will return it.
         * 
         * $cached_file_name is the url of the file we want cached - this will be md5's this side.
         * $cached_time is our cached window - this will be in seconds.
         * 
         */    
        if($cached_time == null){
            $cached_time = $this->cached_time;
        }
        
        $search_pattern  = $this->cache_directory . md5($cached_file_name) . '*';
        
        $file_search_array = glob($search_pattern);
        
         // Sort files by modified time, latest to earliest
        // Use SORT_ASC in place of SORT_DESC for earliest to latest
        array_multisort(
          array_map( 'filemtime', $file_search_array ),
          SORT_NUMERIC,
          SORT_DESC,
          $file_search_array
        );
        if($file_search_array){
            $latest_cached_file = $file_search_array[0];
            $cached_file_time = (int)end(explode('_',$latest_cached_file));
            if(time() < $cached_file_time + $cached_time){ 
                return file_get_contents($latest_cached_file);               
            }else{
                if($delete){ // if we want to delete the file because it's out of date we can do that.
                    unlink($latest_cached_file);
                }
                return false;
            }
            return $file_search_array;
        }else{
            return false;    
        }
        
    }  
    
    public function cacheFile($cached_file_name,$content){
        /*
         * method that will cache a file. 
         * $cached_file_name :: string : is the file we want to cache.
         * $content :: string : is the content we wish to cache.
         * 
         */    
         
         $cached_file_name = $this->cache_directory . md5($cached_file_name) . '_' . time();
         if(file_put_contents($cached_file_name, $content)){
             return true;
         }else{
             return false;
         }
         
    }
         
 }
     
