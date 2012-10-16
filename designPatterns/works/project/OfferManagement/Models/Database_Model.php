<?php
require_once 'config.php';

class Database_Model {

    public $table;
    public $connection;
    public $currentRow;
    private static $instance;
    protected $table_name;

    public function  __construct() {

        $this->connect(MYSQL_SERVER,MYSQL_USER,MYSQL_PW,MYSQL_DB,MYSQL_PORT);

        $this->setTable($this->table_name);
    }
    
    public static function getInstance(){
        
        if(is_null(self::$instance))
            self::$instance = new Database_Model();
        
        return self::$instance;
    }
    
    public function connect($host,$username,$password,$database,$port='3306')
    {
       
        $con = mysql_connect($host.":".$port,$username,$password);
        
        if (!$con) {
            
          die('Could not connect: ' . mysql_error());
        }
        
        mysql_select_db($database, $con);
        mysql_query("SET NAMES utf8");
        $this->connection=$con;

    }

    /**
     * SETTERS for table 
     * @param string $name 
     */
    public function setTable($name)
    {
        $this->table=$name;
    }
    /**
     * GETTERS for table
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    public function close()
    {
        mysql_close($this->connection);
    }

    public function readArray($result)
    {
        $this->currentRow=mysql_fetch_array($result);
        return $this->currentRow;
    }


    /**
     * Execute SQL query
     * @param string $sql 
     * @return array
     */
    public function query($sql)
    {
        $rs = mysql_query($sql, $this->connection);
        
        if (mysql_errno($this->connection))
        {
           
            
            trigger_error("SQL ERROR: <br/>
            ERROR: " . mysql_error($this->connection) . "<br />
            QUERY: {$sql}", E_USER_ERROR);
        }
        return $rs;
    }

    /**
     * SELECT ALL from table
     * @return array
     */
    public function selectAll()
    {
        $sql = "select * from ".$this->getTable();
        return $this->query($sql);
    }

    public function backupToFile($file)
    {
        $sql = "SELECT * INTO OUTFILE '$file' FROM ".$this->getTable();
        $this->query($sql);
    }

    public function restoreFromFile($file)
    {
        $sql = "LOAD DATA INFILE '$file' INTO TABLE ".$this->getTable();
        $this->query($sql);
    }

    public function booleanTF($value)
    {
        if($value==1)
            return "True";
        else
            return "False";
    }

    public function formatDateToSQL($date){
        
        if(trim($date)=="") return "";
        if($this->checkIfSQLDATE($date)) return $date;
        $dates = explode("/", $date);
        return $dates[2] . "-" . $dates[1] . "-" . $dates[0];
    }
    
    public function formatDateToFrFormat($date){
        
        if(trim($date)=="") return "";
        if(!$this->checkIfSQLDATE($date)) return $date;
        $dates = explode("-", $date);
        return $dates[2] . "/" . $dates[1] . "/" . $dates[0];
    }
	 
    public function formatDateFromTimestamp($now=null)
    {
            if(empty($now))
                    $now = time();
            return date("Y-m-d H:i:s", intval($now));
    }

    public function formatDateFromString($time='')
    {
        if(empty($time)){
            
            $time = time();
        }
        else{
            
            $time = strtotime($time);
        }

        return date("Y-m-d H:i:s", intval($time));
    }

    public function checkIfSQLDATE($date){
        $dates = explode("-", $date);
        if(!isset($dates[2]))
            return false;
        if(!isset($dates[1]))
            return false;
        if(!isset($dates[0]))
            return false;
        return true;
    }

    /**
     * @author Gulshan Bhaugeerothee
     * The input should be a Key-Value pair array where the Key represents the
     * table's column name and the value is the value to be saved.
     * 
     * e.g.
     *
     * $fldarray=array('fldname1'=>'myvalue1','fldname2'=>'myvalue2','fldname3'=>'myvalue3')
     * 
     * OR
     * 
     * $data['fieldname1'] = 'value1';
     * $data['fieldname2'] = 'value2';
     * 
     * $this->insertRecord($data);
     *
     * @param <array> $fldarray
     */
    public function insertRecord($fldarray){
        $fldstr='';
        $valstr='';
        $cnt=count($fldarray);
        $i=0;
        foreach($fldarray as $fld=>$val){
            $i++;
            $fldstr.='`'.$fld.'`';
            $valstr.='\''.mysql_real_escape_string($val,$this->connection).'\'';
            if($i<$cnt){
                $fldstr.=', ';
                $valstr.=', ';
            }

        }

        $sql = "INSERT INTO ".$this->getTable();
        $sql .=" ( $fldstr )";
        $sql .=" VALUES ( $valstr );";
       
        return $this->query($sql);
    }

    
    /**
     * @author Gulshan Bhaugeerothee
     * The input should be a Key-Value pair array where the Key represents the
     * table's column name and the value is the value to be saved.
     * e.g.
     *
     * $fldarray=array('fldname1'=>'myvalue1','fldname2'=>'myvalue2','fldname3'=>'myvalue3')
     *
     * $primearray is the same, just that it must contain the field conditions
     * for saving, e.g. is to update a record, you must match the primary key
     * with its current value.
     * 
     * EXAMPLE : UPDATE table_name SET field1=value1,field2=value2 WHERE id= value_id
     * 
     *  $fldarray['field1'] = value1;
     *  $fldarray['field2'] =value2;
     * 
     * $primearray['id'] = value_id;
     * 
     * $this->updateRecord($primearray,$fldarray);
     *
     *
     * @param <array|mixed> $primearray
     * @param <array|mixed> $fldarray
     */
    public function updateRecord($primearray,$fldarray){
        $fldstr='';
       
        $i=0;
        foreach($fldarray as $fld=>$val){
            $i++;
            $fldstr.='`'.$fld.'`=\''.mysql_real_escape_string($val,$this->connection).'\'';
            if($i<count($fldarray)){
                $fldstr.=', ';
            }
        }
        $pristr='';
       
        $j=0;
        foreach($primearray as $fld=>$val){
            $j++;
            $pristr.='`'.$fld.'`=\''.mysql_real_escape_string($val,$this->connection).'\'';
            if($j<count($primearray)){
                $pristr.=' and ';
            }
        }
        $sql = "UPDATE ".$this->getTable()." SET $fldstr";
        
        $sql .= " WHERE $pristr;";
       
        return $this->query($sql);
    }

    /**
     * Select a specific record
     * @access public
     * @param array $primearray goes into the WHERE condition
     * @param array|string $fldarray what you want to select
     * @return resource id
     */
    public function selectRecord($primearray,$fldarray){
        $fldstr='';
        if(is_array($fldarray)){
            $cnt=count($fldarray);
            $i=0;
            foreach($fldarray as $fld){
                $i++;
                $fldstr.='`'.$fld.'`';
                if($i<$cnt){
                    $fldstr.=', ';
                }
            }
        }
        else{
            if(trim($fldarray)=='*')
                $fldstr='*';
            else
                $fldstr='`'.trim($fldarray).'`';
        }
        $pristr='';
        $cnt=count($primearray);
        $i=0;
        foreach($primearray as $fld=>$val){
            $i++;
            $pristr.='`'.$fld.'`=\''.mysql_real_escape_string($val,$this->connection).'\'';
            if($i<$cnt){
                $pristr.=' AND ';
            }
        }


        $sql = "select $fldstr from ".$this->getTable();
        if($cnt>0)
            $sql .= " WHERE $pristr;";

        return $this->query($sql);
    }



    public function deleteRecord($primearray){
        $pristr='';
        $cnt=count($primearray);
        $i=0;
        foreach($primearray as $fld=>$val){
            
            $i++;
            $pristr.='`'.$fld.'`=\''.mysql_real_escape_string($val,$this->connection).'\'';
            if($i<$cnt){
                $pristr.=' and ';
            }
        }
        if($cnt>0){
            
            $sql = "DELETE from ".$this->getTable();
            $sql .= " WHERE $pristr;";
            return $this->query($sql);
        }
        else{
            throw new Exception("Primary Key not defined in delete query...
                Dangerous operation Blocked");
            return false;
        }
    }

	 
    public function lastInsertId()
    {
        $rs = mysql_fetch_assoc($this->query('SELECT LAST_INSERT_ID() as lastId'));

        if(!empty($rs['lastId']))
                return $rs['lastId'];
        return false;
    }

	 
    public function escape($var,$quote=false)
    {
            if(is_null($var))
                    return 'null';

            if(strlen(''.$var)==0) // may need to test this.
                    return "''";

            $esc = mysql_real_escape_string(strval($var), $this->connection);

            if(!$quote)
                    return $esc;

            return "'".$esc."'";
    }

    /**
     * takes an array and returns a comma delimited string containing the quoted escaped variables.
     *
     * @param <array> $var
     */
    public function escapeArray($var)
    {		
            if(!is_array($var))
                    return $this->escape($var,true);

            foreach($var as &$v)
                    $v = $this->escape($v,true);

            return implode(',',$var);		
    }

    public function getTableStatus()
    {
        return $this->readArray($this->query("SHOW TABLE STATUS where Name ='{$this->getTable()}'"));
    }

    /**
     * gets the count of the total number of rows in the table as reported by table status. 
     * It is approximate for innoDB tables.
     *
     * @return <int>
     */
    public function getTableTotalRows()
    {
            $tmp = $this->readArray($this->query("select count(*) as Rows from {$this->getTable()}")); 

            return intval($tmp['Rows']);
    }

    public function freeResource($result)
    {
            mysql_free_result($result);
    }
	
    /**
     * takes a mysql resource and attempts to retrieve a useful array from it.
     * This method is useful for resultsets with multiple rows.
     * resource will be freed after data is extracted.
     *
     * @param <resource_identifier> $result
     * @param <string> $key optional. field why which to key the returned array. !! it must be a unique field.
     * @return <array>
     */
    public function resultToArray($result,$keyBy=null)
    {
            if(!is_resource($result))
                    return array();

            $tmp = array();

            while($v = mysql_fetch_assoc($result))
            {
                    if(!is_null($keyBy) && isset($v[$keyBy]))
                            $tmp[$v[$keyBy]] = $v;
                    else
                            $tmp[]=$v;
            }

            $this->freeResource($result);

            return $tmp;
    }

    /**
     * builds an sql limit <offset>,<limit> string. 
     * 
     * Useful for pagination
     *
     * @return <String>
     */
    public function buildLimit($limit=null,$offset=0)
    {
            $limit = intval($limit);
            

            if(empty($limit) or $limit < 0)
                    return '';

            $offset=(intval($offset)<0)? 0:intval($offset);

            return " LIMIT {$offset},{$limit}";		
    }

    /**
     * @author Gulshan Bhaugeerothee
     * LOCK A TABLE
     * 
     */

    public function setLock()
    {
        return $this->query(
                'LOCK TABLES '.$this->getTable().' WRITE, '.$this->getTable().' AS p1 READ'
                );
    }

   
    public function releaseLock()
    {
        return $this->query("UNLOCK TABLES");
    }


    /**
     * STARTS A TRANSACTION
     * 
     * 
     */
    public function startTransaction()
    {
        return $this->query("START TRANSACTION");
    }

    public function endTransaction()
    {
        return $this->query("COMMIT");
    }

    public function undoTransaction()
    {
        return $this->query("ROLLBACK");
    }


    /**
     * Returns number of affected rows after UPDATE,DELETE,REPLACE or INSERT
     * @author Gulshan Bhaugeerothee
     * @return int
     */
    public function affectedRows()
    {
        return mysql_affected_rows();
    }


    /**
     * Returns number of rows of the query
     * @author Gulshan Bhaugeerothee
     * @param string $query 
     * @return int
     */
    public function numRows($query)
    {
        return mysql_num_rows($this->query($query));
    }

    /**
     * Shorten the text by adding '...'
     * @author Gulshan Bhaugeerothee
     * @param string $text 
     * @param int $max 
     * @return string
     */
    public function shortenTexts($text,$max = 250){
        
        if(strlen($text)>$max){

            return substr($text,0,$max).' ...';

        }else{
            return $text;
        }
            
    }

}

