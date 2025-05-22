                    <div></div>
                    @if ($hotel->rooms()->exists())
                    @if($hotel->rooms()->latest()->pluck('breakfast')->first() === 'Free BreakFast')
                    <p><span class="font-semibold"><i class="fa-solid fa-utensils"></i></span>  Breakfast included</p>
                    @else
                    <p class="text-slate-700"><span class="font-semibold"><i class="fa-solid fa-utensils"></i></span>  Breakfast JOD {{$hotel->services()->where('name','breakfast')->pluck('price')->first()}}</p>
                    @endif

                    @if($hotel->rooms()->latest()->pluck('cancellation_policy')->first() === 'Free cancellation')
                        <p><span class="font-semibold"><i class="fa-solid fa-check"></i></span>  Free cancellation</p>
                    @else
                        <p class="text-red-500"><span class="font-semibold"><i class="fa-solid fa-circle-xmark"></i></span>  Non-refundable</p>
                    @endif
                    @endif
                    
                    