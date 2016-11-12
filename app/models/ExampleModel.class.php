<?php
	class Example extends Model{
	   public static $_table = 'example'; // this is if we wanted to override the table name
       public static $_id_column = 'example_id'; // if we had primary key that wasn't id
	}