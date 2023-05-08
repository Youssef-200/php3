<?php 

class ajax{
       
   /**
    * __construct
    *
    * @param  string $action
    * @param  string $page
    * @return void
    */
   function __construct($page,$action){
    echo $this->connect($page,$action);
    
   }
    
    /**
     * connect
     * @param string $page
     * @param string $action
     * @return string
     */
    function connect($page,$action){
        $a='<script>
        var ajax=new XMLHttpRequest();
        
        '.$this->actionAjax($page,$action).'
        </script>
    ';
   
    return $a;

    }
    
    
    /**
     * actionAjax
     *
     * @param  string $action
     * @param  string $page
     * @return string
     */
    private function  actionAjax($page,$action){
        return '
        
        
        function getServerTime() {
           
            
            var thePage = "'.$page.'.php";
            ajax.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  '.$action.'
                }
              }
              ajax.open("GET", thePage, true);
              ajax.send(null);
            }
           
            
            

        ';
    }
   
}