<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class salon extends Model
{
    public $timestamps = false;
   
    public function user()
    {
    	return $this->belongsTo(user::class);
    }
    public static function getlist($maxLat,$minLat,$maxLon,$minLon)
    {

     
        return  salon::where('lat', '<=', $maxLat)
                    ->where('long', '<=', $maxLon)
                    ->where('lat', '>=', $minLat)
                    ->where('long', '>=', $minLon)
                    ->get(); 
    }
    
}




// 	SELECT
//       name, address,(
//         3959 * acos(
//                     cos(
//                             radians(29.692)  
//                         ) *
//                     cos(
//                             radians( `lat` )
//                         ) *
//                     cos(
//                             radians( `long` ) - radians(76.9845) 
//                         ) +
//                     sin(
//                             radians(29.692) 
//                         ) *
//                     sin(
//                             radians( `lat` )
//                         )
//                 )
//     ) AS Distance
// FROM salons WHERE   (
//         3959 * acos(
//                     cos(
//                             radians(29.692)  
//                         ) *
//                     cos(
//                             radians( `lat` )
//                         ) *
//                     cos(
//                             radians( `long` ) - radians(76.9845) 
//                         ) +
//                     sin(
//                             radians(29.692) 
//                         ) *
//                     sin(
//                             radians( `lat` )
//                         )
//                 )
//     ) < 5 ORDER BY Distance ASC LIMIT 1