<?php

namespace App\Http\Controllers;

use App\ChosenWorkshop;
use Illuminate\Http\Request;
use App\Workshop;

class SearchFilterController extends Controller
{

    public function searchWorkshops(Request $request)
    {
        $workshops = Workshop::where('name', 'like', '%' . $request->search . '%');
        $workshops = ($request->user() != null) ? $this->getUserDisplayedWorkshop($workshops, $request->user()) :
            $this->getGuestDisplayedWorkshop($workshops);

        return view('join', compact('workshops'));
    }

    public function filterWorkshops(Request $request)
    {
        $comparator = $this->getComparator($request->filterPrice);
        $workshops = Workshop::where('price', $comparator['operator'], $comparator['operand']);
        $workshops = ($request->user() != null) ? $this->getUserDisplayedWorkshop($workshops, $request->user()) :
            $this->getGuestDisplayedWorkshop($workshops);

        return view('join', compact('workshops'));
    }

    private function getUserDisplayedWorkshop($workshops, $user)
    {
        $notDisplayedWorkshopId = $user->chosenWorkshops()
            ->where(function ($query) {
                $query
                    ->where('workshop_status', 'my_workshop')
                    ->orWhere('workshop_status', 'upcoming');
            })
            ->distinct()->pluck('workshop_id');
        return $workshops->whereNotIn('id', $notDisplayedWorkshopId)->where('is_verified', 1)->paginate(5);
    }

    private function getGuestDisplayedWorkshop($workshops)
    {
        $notDisplayedWorkshopId = ChosenWorkshop::where('workshop_status', 'history')
            ->distinct()->pluck('workshop_id');

        return $workshops->whereNotIn('id', $notDisplayedWorkshopId)->where('is_verified', 1)->paginate(5);
    }

    private function getComparator($filterPrice)
    {
        switch ($filterPrice) {
            case '1':
                return ['operator' => '<=', 'operand' => 100000];
                break;

            case '2':
                return ['operator' => '<=', 'operand' => 200000];
                break;

            case '3':
                return ['operator' => '>', 'operand' => 200000];
                break;

            default:
                return ['operator' => '<=', 'operand' => 100000];
                break;
        }
    }
}
