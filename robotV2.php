<?php 

const NORTH = 1;
const EAST = 2;
const SOUTH = 3;
const WEST = 4;

$dir = [ 1 => "NORTH", 2 => "EAST", 3 => "SOUTH", 4 => "WEST"];

$x = $argv[1];
$y = $argv[2];

if(!is_numeric($x) || !is_numeric($y)){
	die("Co-ordinates must be Integer\n");
}

$presentdir = $argv[3];

if($presentdir != 'NORTH' && $presentdir != 'EAST' && $presentdir != 'SOUTH' && $presentdir != 'WEST'){
	 die("Wrong Direction\n");
}

$presentdirnum = constant($presentdir);
$path = $argv[4];

for($i = 0; $i < strlen($path); $i++ ){

	switch($path{$i}){

		case 'R':
			if($presentdirnum == 4){
				$presentdirnum = 1;
			} else {
				$presentdirnum++;
			}
			
			break;
        case 'L':
            if($presentdirnum == 1){
                $presentdirnum = 4;
            } else {
                $presentdirnum--;
            }
            break;
        case 'W':
					
			switch($presentdirnum){
				
				case 1: // this is north 
					$y += $path{$i+1}; 
					break;
					
				case 2: // this is EAST 
					$x += $path{$i+1};
					break;
				
				case 3: // this is south 
					$y -= $path{$i+1}; 
					break;
				
				case 4: // this is west 
					$x -= $path{$i+1};
					break;
				
				default: break;
				
			}
			
			$i++;
			
            break;
		default:
			if(is_numeric($path{$i})){
				echo "Number should be ranging from 0 - 9\n";
			} else {
				echo "Given char '".$path{$i}."' is not valid\n";
			}
			break;
	}
}
echo $x." ".$y." ".$dir[$presentdirnum]."\n";


?>