<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hotel;
use App\Models\Review;
use App\Models\Room;
use App\Models\Service;
use App\Models\Season;
use Carbon\Carbon;
class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hotels = [
            [
                'name' => 'Mövenpick Resort & Spa Tala Bay Aqaba',
                'description' =>'This beachfront, 5-star Tala Bay resort has a dive center, lagoon-style pool with waterfalls and 12,917 ft² spa and health club . All rooms include a private balcony and free minibar. It features Wi-Fi in all areas.

                Outdoor dining overlooking Tala Bay is available at Mövenpick Resort & Spa Aqaba’s restaurant Selan. Other dining options include Italian cuisine and a pub serving light meals. Poolside and beachside bars are also available.

                Mövenpick Resort Tala Bay Aqaba’s spacious rooms are decorated with light colors and have floor-to-ceiling windows. 24-hour hour room service is available, and some rooms have Red Sea views.

                On-site recreation options include a watersports center, several pools including a lazy river, and a nightclub.  Zara Spa Tala Bay features a scented relaxation room, and younger guests can enjoy the Mövenpick  Aqaba’s children’s club.

                Central Aqaba is a 15-minute drive away. Guests can reach King Hussein International Airport in a 20-minute drive, and on-site private parking is free.

                Couples in particular like the location – they rated it 8.3 for a two-person trip.',
                'Governorate' => 'Aqaba',
                'rating' => 8.1,
                'rating_score' => 'Very Good',
                'distance_from_downtown'=> 13.8,
                'url' => 'https://cf.bstatic.com/xdata/images/hotel/square600/275709866.webp?k=d1e0cb6e3f6089063c9544a2dbe9f4718b093804da80da498350b0a7ad0ee4ca&o=',
                'recommended' => true,
                'stars' => 5,
                
            ],
            [
                'name' => 'Landmark Amman Hotel & Conference Center',
                'description' => 'Get the celebrity treatment with world-class service at Landmark Amman Hotel & Conference Center
                The elegant Landmark Amman Hotel & Conference Center is located in the heart of the diplomatic and business districts of Amman. It offers free Wi-Fi, an outdoor pool, and a fitness center.

                All the modern and spacious rooms of Landmark Amman & Conference Center have seating areas and satellite TV.

                Fitness n’ Wellness health club offers a wide range of gym equipment. Massages treatments include a deep tissue massage and a shiatsu massage.

                There are 6 restaurants and bars, including Colors All Day Restaurant. Fresh juices are available at Sugar Cube. Ghoroub is located on the 13th Floor and serves delicious refreshments and cocktails.

                Landmark Amman is a 5-minute drive from the Roman Theater. Marka International Airport is 5 mi away and 10 minutes by car to Sofex Exhibition. Free private parking is available.

                Couples in particular like the location – they rated it 9.5 for a two-person trip.',
                'city' => 'Abdali',
                'Governorate' => 'Amman',
                'rating' => 9.4,
                'rating_score' =>'Wonderful',
                'distance_from_downtown'=> 3.9,
                'url' =>'https://cf.bstatic.com/xdata/images/hotel/square600/177530477.webp?k=40ccf97078901fa7ccbc9fcea26d4f2aee554875453e640f5ac50b0f0758ecc8&o='
                ,'recommended' => true,
                'stars' => 5,
                
            ],
            [
                'name' => 'Hyatt Regency Aqaba Ayla Resort',
                'description' => 'Prime Beachfront Location: Hyatt Regency Aqaba Ayla Resort in Aqaba offers a private beach area and beachfront access. Guests enjoy an infinity swimming pool, spa facilities, and a fitness center. The resort features a lush garden, terrace, and free WiFi throughout.

                Comfortable Accommodations: Rooms include air-conditioning, balconies with sea views, and private bathrooms. Additional amenities include bathrobes, mini-bars, and flat-screen TVs. The resort provides free on-site private parking, a 24-hour front desk, and concierge services.

                Dining Experience: The family-friendly restaurant serves Greek, Italian, Mediterranean, and Middle Eastern cuisines. Breakfast options include continental, American, buffet, full English/Irish, vegetarian, vegan, and gluten-free. Guests can also enjoy lunch, dinner, and high tea in a traditional, modern, or romantic setting.

                Local Attractions: Located 5.6 mi from King Hussein International Airport, the resort is near Royal Yacht Club (2.5 mi) and Aqaba Fort (3.1 mi). Other attractions include Eilat Botanical Garden (7.5 mi) and Underwater Observatory Park (13 mi).

                Couples in particular like the location – they rated it 8.8 for a two-person trip.',
                'Governorate' => 'Aqaba',
                'rating' => 8.5,
                'rating_score' => 'Very Good',
                'distance_from_downtown'=> 3,
                'url' => 'https://cf.bstatic.com/xdata/images/hotel/square600/175211938.webp?k=9c50b89bd341c95c2b987e0a7f68d7fc37e6d805c8dddc393d9e3b8fb6e01a39&o='
                ,'recommended' => true,
                'stars' => 5,
                
            ],
            [
                'name' => 'RUM MAGIC BUBBLE lUXURY CAMP',
                'description' => 'You might be eligible for a Genius discount at RUM MAGIC BUBBLE lUXURY CAMP. Sign in to check if a Genius discount is available for your selected dates.

                Genius discounts at this property are subject to booking dates, stay dates, and other available deals.

                Experience World-class Service at RUM MAGIC BUBBLE lUXURY CAMP
                Featuring a garden, RUM MAGIC BUBBLE lUXURY CAMP offers accommodations in Wadi Rum. This 5-star apartment offers an elevator and full-day security. The apartment also features free Wifi, free private parking, and facilities for disabled guests.

                All of the air-conditioned units feature a private bathroom, flat-screen TV, fully equipped kitchen, and terrace. A balcony with an outdoor dining area and mountain views is offered in each unit. The rooms are equipped with heating facilities.

                The apartment offers a buffet or à la carte breakfast.

                King Hussein International Airport is 47 miles from the property.',
                'Governorate' => 'Aqaba',
                'city' => 'Wadi Rum',
                'rating' => 9.7,
                'rating_score' => 'Exceptional',
                'distance_from_downtown'=> 5.3,
                'url' => 'https://cf.bstatic.com/xdata/images/hotel/square600/655143387.webp?k=5380dba0ae9c4a225b8d5c120d92cf7fb9bca532a247131de50e664cc1592a24&o='
                ,'recommended' => true,
                'stars' => 5,
                
            ],
            [
                'name' => 'Bristol Hotel',
                'description' => 'The Bristol Hotel is located in the center of Amman, close to the city’s business and commercial district. This 5-star hotel offers comfortable rooms, WiFi at an added fee and free parking.

                Breakfast is included in the room rate and can be enjoyed on the sunny terrace overlooking the pool. There are 3 restaurants and bars at the hotel, open throughout the day and serving a great selection of international food including many local specialties.

                Relax in the sun by the Bristol Hotel’s lovely swimming pool. There is also a fitness center for guests to use.

                Couples in particular like the location – they rated it 9.2 for a two-person trip.  ',
                'Governorate' => 'Amman',
                'city' => 'Abdoun',
                'rating' => 8.8,
                'rating_score' => 'Excellent',
                'distance_from_downtown'=> 6.5,
                'url' => 'https://cf.bstatic.com/xdata/images/hotel/square600/304597686.webp?k=00fae19f89f88273853acff6ecc1b60d8262bb77f3260dcc42dcc5f8897a112d&o='
                ,'recommended' => true,
                'stars' => 5,
                
            ],

        ];
        $currentYear = Carbon::now()->year;

        $seasons = 
        [
            [
            'name' => 'Summer High Season',
            'start_date' => Carbon::create($currentYear,6,15),
            'end_date' => Carbon::create($currentYear,8,31),
            'base_multiplier'=> 1.25],
            [
                'name' => 'Winter Promotion',
                'start_date' => Carbon::create($currentYear,12,1),
                'end_date' => Carbon::create($currentYear + 1,2,28),
                'base_multiplier' => 0.75,
            ],[
                'name' => 'Spring Shoulder Season',
                'start_date' => Carbon::create($currentYear, 3, 1),
                'end_date' => Carbon::create($currentYear, 5, 31),
                'base_multiplier' => 1.10
            ],[
                'name' => 'Autumn Regular Season',
                'start_date' => Carbon::create($currentYear, 9, 1),
                'end_date' => Carbon::create($currentYear, 11, 30),
                'base_multiplier' => 0.90
            ]
        ];
        foreach($seasons as $season){
            Season::create($season);
        }

        $allSeasons = Season::all();
        
        
        foreach($hotels as $hotel){
            $newHotel = Hotel::create($hotel);
            $reviews_no = random_int(15,50);

            Review::factory()->count($reviews_no)
            ->bad()
            ->create([
                'hotel_id'=> $newHotel->id,
            ]);

            Service::factory()->count(1)
            ->create([
                'hotel_id' =>$newHotel->id
            ]);

            $rooms = Room::factory()->count(100)
            ->fake_rooms($newHotel->id)
            ->create([
                'hotel_id'=>$newHotel->id,
            ])
            ->each(function($room) use ($newHotel) {
                $room->price_per_night = match($newHotel->id) {
                    1 => 159,
                    2 => 85,
                    3 => 155,
                    4 => 104,
                    5 => 80,
                    default => $room->price_per_night 
                };
                $room->minimum_price = match($newHotel->id){
                    1 => 95,
                    2 => 85,
                    3 => 135,
                    4 => 104,
                    5 => 80,
                    default => $room->minimum_price
                };
                $room->save();
            });
            
            
            
            foreach($rooms as $room) {
                $room->seasons()->attach($allSeasons->pluck('id')->toArray(), [
                    'custom_multiplier' => null 
                ]);
            }

            Facility::factory()->create($reviews_no);
        }
    }
}
