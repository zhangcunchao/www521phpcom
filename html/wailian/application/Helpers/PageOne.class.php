<?php

class PageOne {
	protected $total;     //查询所有的数据总记录数
	protected $page;      //当前第几页
	protected $num;       //每页显示记录的条数
	protected $pageNum;   //一共多少页
	protected $url;
	protected $nextPage;
	protected $prevPage;
	protected $start;
	protected $end;
	protected $first='首页';
	protected $last='尾页';
	protected $next='下一页';
	protected $prev='上一页';


	function __construct($url,$total, $num=5) {
		$this->page=isset($_GET["page"])?$_GET["page"]:1;
		$this->url=$url;
		
		$this->total=$total;
		$this->num=$num;
		$this->pageNum=$this->getPageNum();
		$this->nextPage=$this->getNextPage();
		$this->prevPage=$this->getPrevPage();
		$this->start=$this->getStartNum();
		$this->end=$this->getEndNum();
	}
	//获取当前页
	public function nowPage(){
		return $this->page;
	}

	protected function getPageNum(){
		return ceil($this->total/$this->num);
	}

	protected function getNextPage() {
		if($this->page==$this->pageNum)
		return false;
		else
		return $this->page+1;
	}

	protected function getPrevPage() {
		if($this->page==1)
		return false;
		else
		return $this->page-1;
	}
	//数据库查询的偏移量
	public function getOffset() {
		return ($this->page-1)*$this->num;
	}
	//当前页开始的记录数
	protected function getStartNum() {
		if($this->total==0)
		return 0;
		else
		return $this->getOffset()+1;
	}
	//当前页结束的记录数
	protected function getEndNum() {
		return min($this->getOffset()+$this->num,$this->total);
	}



	public function getPage(){
		//$pinfo="共 <b>{$this->total}</b> 条记录,本页显示 {$this->start}-{$this->end} 条&nbsp;&nbsp;&nbsp;&nbsp;{$this->page}/{$this->pageNum}&nbsp;&nbsp;&nbsp;&nbsp;";
		$pinfo ='';
//		if ($this->page==1)
//		$pinfo.=$this->first.'&nbsp;&nbsp';
//		else
//		$pinfo.='<a href="'.$this->url.'page=1">'.$this->first.'</a>&nbsp;&nbsp;';
		if ($this->prevPage)
		$pinfo.='<li><a href="'.$this->url.'page='.$this->prevPage.'">'.$this->prev.'</a></li>&nbsp;&nbsp;';
		else
		$pinfo.='<li>'.$this->prev.'</li>'.'&nbsp;&nbsp;';

		$pinfo.="<li>第{$this->page}页&nbsp;/共{$this->pageNum}页&nbsp;&nbsp;</li>";

		if ($this->nextPage)
		$pinfo.='<li><a href="'.$this->url.'page='.$this->nextPage.'">'.$this->next.'</a></li>&nbsp;&nbsp;';
		else
		$pinfo.='<li>'.$this->next.'</li>'.'&nbsp;&nbsp;';

//		if ($this->page==$this->pageNum)
//		$pinfo.=$this->last.'&nbsp;&nbsp;';
//		else
//		$pinfo.='<a href="'.$this->url.'page='.$this->pageNum.'">'.$this->last.'</a>&nbsp;&nbsp;';

		return $pinfo;
	}
	//后台分页
    public function getPageAdmin(){
		$pinfo="共 <b>{$this->total}</b> 条记录,本页显示 {$this->start}-{$this->end} 条&nbsp;&nbsp;&nbsp;&nbsp;{$this->page}/{$this->pageNum}&nbsp;&nbsp;&nbsp;&nbsp;";
		$pinfo ='';
	if ($this->page==1)
	$pinfo.=$this->first.'&nbsp;&nbsp';
	else
	$pinfo.='<a href="'.$this->url.'page=1">'.$this->first.'</a>&nbsp;&nbsp;';


		if ($this->prevPage)
		$pinfo.='<a href="'.$this->url.'page='.$this->prevPage.'">'.$this->prev.'</a>&nbsp;&nbsp;';
		else
		$pinfo.=''.$this->prev.'</li>'.'&nbsp;&nbsp;';

		$pinfo.="第{$this->page}页&nbsp;/共{$this->pageNum}页&nbsp;&nbsp;";

		if ($this->nextPage)
		$pinfo.='<a href="'.$this->url.'page='.$this->nextPage.'">'.$this->next.'</a>&nbsp;&nbsp;';
		else
		$pinfo.=''.$this->next.'&nbsp;&nbsp;';

	if ($this->page==$this->pageNum)
	$pinfo.=$this->last.'&nbsp;&nbsp;';
	else
	$pinfo.='<a href="'.$this->url.'page='.$this->pageNum.'">'.$this->last.'</a>&nbsp;&nbsp;';

		return $pinfo;
	}
}
?>

