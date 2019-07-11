<?php 
   # ========================================================================# 
   # 
   #  Author:    Mano Kalousdian 
   #  Version:     1.5 
   #  Date:      july 30, 2010 
   #  Purpose:   paginates a page 
   #  Requires : Requires PHP4 or PHP5 
   #  Usage Example: 
   #          $pager=new pagination($connection_link,$query,$thispage,100,$passingparams); //100 is the number of records per page 
   #          $pager->type="normal"; //dropdown,normal 
   #          $pager->pagingdistance="2"; //it is the distance of upper and lower part of the page number,can be 0 to show all the records 
   #          $pager->prev="<"; //you can also put html tags or images instead of a character 
   #          $pager->next=">"; 
   #          $pager->first="<<"; 
   #          $pager->last=">>"; 
   #          $pager->showifonepage=false; 
   #          $res=$pager->paginate(); 
   # ========================================================================# 

 class pagination { 
    public $con; 
    public $query; 
    public $thispage; 
    public $numperpage; 
    public $offset; 
    public $extravariables; 
    public $numrecords=0; 
    public $lastpage; 
    public $numpages=0; 
    public $builtupquery; 
    public $type='normal'; // dropdown or normal 
    public $pagingdistance='2'; // //it is the distance of upper and lower part of the page number,can be 0 to show all the records 
    public $pagemin; // minimum page offset , ex 0 
    public $pagemax; // maximum page offset , equal to total number of pages 
    public $prev='Prev'; 
    public $next='Next'; 
    public $first='First'; 
    public $last='Last'; 
    public $showifonepage=true; 
     
    function __construct($con,$query,$thispage,$numperpage,$extraquery){ 
        $this->con=$con; 
        $this->query=$query; 
        $this->numperpage=$numperpage; 
        $this->extraquery=$extraquery; 
        $this->thispage=$thispage; 
         
        $this->numrecords=mysql_num_rows(mysql_query($this->query)); 
         $this->lastpage=(fmod($this->numrecords,$this->numperpage)==0)?0:1; 
        $this->numpages=floor($this->numrecords/$this->numperpage)+$this->lastpage; 
           $this->offset=($this->thispage-1)*$this->numperpage; 
    } 
     
    function paginate(){ 
        $this->builtupquery=mysql_query("$this->query limit $this->offset,$this->numperpage",$this->con); 
        return $this->builtupquery; 
    } 
     
    function render(){ 
          if($this->pagingdistance!=0){ 
                           $this->pagemin=($this->thispage-$this->pagingdistance<=0)?1:$this->thispage-$this->pagingdistance; 
                           $this->pagemax=($this->thispage+$this->pagingdistance>=$this->numpages)?$this->numpages:$this->thispage+$this->pagingdistance; 
                                   if($this->thispage<$this->pagingdistance*2){ 
                                       $this->pagemax=($this->pagingdistance*2+1<$this->numpages)?$this->pagingdistance*2+1:$this->numpages; 
                                   } 
           }else{ 
                           $this->pagemin=1; 
                           $this->pagemax=$this->numpages;    
           } 
            
         //if showifonepage is set to false , if theres one result , the pagination items menu dont show   
        if($this->showifonepage!=false || $this->numpages!=1){ 
                if($this->type=="dropdown"){ 
                    $this->render1(); 
                } 
                if($this->type=="normal"){ 
                    $this->render2(); 
                } 
        } 
    } 
     
    function render1(){?> 
    <select name="pages" onChange="window.location='<?php echo $_SERVER['PHP_SELF']?>?<?php echo $this->extraquery?>&thispage='+this.value+''"> 
                           <?php 
                           
                            
                           for($i=$this->pagemin;$i<=$this->pagemax;$i++){?> 
                           <option value="<?php echo $i?>" <?php if($this->thispage==$i){?>selected="selected"<?php }?>>Page <?php echo $i?></option> 
                           <?php }?> 
                           </select> 
    <?php } 
     
    function render2(){?> 
     <table cellpadding="0" cellspacing="0"> 
        <tr> 
                           <?php //================================body========================== 
                            for($i=$this->pagemin;$i<=$this->pagemax;$i++){?> 
                              <td style="padding-left:5px;padding-right:5px"><?php if($i!=$this->thispage){?><a href="<?php echo $_SERVER['PHP_SELF']?>?<?php echo $this->extraquery?>&thispage=<?php echo $i?>"><?php echo $i?></a> 
                                                            <?php }else{?> 
                                                              <b><?php echo $i?></b> 
                                                            <?php }?></td> 
                           <?php } 
                             //=====================next========================?> 
                             </tr> 
                           </table> 
    <?php } 
     
    function previous(){?> 
    <?php if($this->showifonepage!=false || $this->numpages!=1){ 
     if($this->thispage-1!=0){?> 
                                       <a href="<?php echo $_SERVER['PHP_SELF']?>?<?php echo $this->extraquery?>&thispage=<?php echo $this->thispage-1?>"><?php echo $this->prev?></a> 
                                      <?php }else{?> 
                                      <?php echo $this->prev?> 
                                      <?php }?> 
    <?php } 
    } 
    function next(){?> 
     <?php if($this->showifonepage!=false || $this->numpages!=1){ 
          if($this->thispage!=$this->numpages){?> 
                                       <a href="<?php echo $_SERVER['PHP_SELF']?>?<?php echo $this->extraquery?>&thispage=<?php echo $this->thispage+1?>"><?php echo $this->next?></a> 
                                      <?php }else{?> 
                                      <?php echo $this->next?> 
                                      <?php }?> 
           
    <?php } 
    } 
     
    function last(){?> 
     <?php if($this->showifonepage!=false || $this->numpages!=1){ 
          if($this->thispage!=$this->numpages){?> 
                                       <a href="<?php echo $_SERVER['PHP_SELF']?>?<?php echo $this->extraquery?>&thispage=<?php echo $this->numpages?>"><?php echo $this->last?></a> 
                                      <?php }else{?> 
                                      <?php echo $this->last?> 
                                      <?php }?> 
           
    <?php } 
    } 
     
    function first(){?> 
    <?php if($this->showifonepage!=false || $this->numpages!=1){ 
         if($this->thispage-1!=0){?> 
                                       <a href="<?php echo $_SERVER['PHP_SELF']?>?<?php echo $this->extraquery?>&thispage=<?php echo '1'?>"><?php echo $this->first?></a> 
                                      <?php }else{?> 
                                      <?php echo $this->first?> 
                                      <?php }?> 
    <?php } 
    } 
     
     
     
     
}?>