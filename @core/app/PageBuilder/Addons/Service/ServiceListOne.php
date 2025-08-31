<?php

namespace App\PageBuilder\Addons\Service;

use App\Category;
use App\ChildCategory;
use App\Country;
use App\PageBuilder\Fields\Switcher;
use App\ServiceArea;
use App\ServiceCity;
use App\Subcategory;
use App\PageBuilder\PageBuilderBase;
use App\PageBuilder\Fields\Number;
use App\PageBuilder\Fields\Select;
use App\PageBuilder\Fields\Slider;
use App\PageBuilder\Fields\Text;
use App\Service;
use App\User;
use App\Zone;
use Monolog\Handler\IFTTTHandler;
use Request;
use Str;
use URL;

class ServiceListOne extends PageBuilderBase
{
    public function preview_image()
    {
        return "service/service_list.png";
    }

    public function admin_render()
    {
        $output = $this->admin_form_before();
        $output .= $this->admin_form_start();
        $output .= $this->default_fields();
        $widget_saved_values = $this->get_settings();

        $output .= Select::get([
            "name" => "order_by",
            "label" => __("Order By"),
            "options" => [
                "id" => __("ID"),
                "created_at" => __("Date"),
            ],
            "value" => $widget_saved_values["order_by"] ?? null,
            "info" => __("set order by"),
        ]);
        $output .= Select::get([
            "name" => "order",
            "label" => __("Order"),
            "options" => [
                "asc" => __("Accessing"),
                "desc" => __("Decreasing"),
            ],
            "value" => $widget_saved_values["order"] ?? null,
            "info" => __("set order"),
        ]);
        $output .= Number::get([
            "name" => "items",
            "label" => __("Items"),
            "value" => $widget_saved_values["items"] ?? null,
            "info" => __("enter how many item you want to show in frontend"),
        ]);

        $output .= Select::get([
            "name" => "columns",
            "label" => __("Column"),
            "options" => [
                "col-lg-3" => __("04 Column"),
                "col-lg-4" => __("03 Column"),
                "col-lg-6" => __("02 Column"),
                "col-lg-12" => __("01 Column"),
            ],
            "value" => $widget_saved_values["columns"] ?? null,
            "info" => __("set column"),
        ]);

        $output .= Slider::get([
            "name" => "padding_top",
            "label" => __("Padding Top"),
            "value" => $widget_saved_values["padding_top"] ?? 110,
            "max" => 200,
        ]);
        $output .= Slider::get([
            "name" => "padding_bottom",
            "label" => __("Padding Bottom"),
            "value" => $widget_saved_values["padding_bottom"] ?? 110,
            "max" => 200,
        ]);

        // service filtering option on/off start
        $output .= Switcher::get([
            "name" => "country_on_off",
            "label" => __("Country"),
            "value" => $widget_saved_values["country_on_off"] ?? null,
            "info" => __("Country wise Service Filtering Hide/Show"),
        ]);

        $output .= Switcher::get([
            "name" => "city_on_off",
            "label" => __("City"),
            "value" => $widget_saved_values["city_on_off"] ?? null,
            "info" => __("City wise Service Filtering Hide/Show"),
        ]);

        $output .= Switcher::get([
            "name" => "area_on_off",
            "label" => __("Area"),
            "value" => $widget_saved_values["area_on_off"] ?? null,
            "info" => __("Area wise Service Filtering Hide/Show"),
        ]);

        $output .= Switcher::get([
            "name" => "service_search_by_text_on_off",
            "label" => __("Service search"),
            "value" =>
                $widget_saved_values["service_search_by_text_on_off"] ?? null,
            "info" => __("Service search Hide/Show"),
        ]);

        $output .= Switcher::get([
            "name" => "category_on_off",
            "label" => __("Category"),
            "value" => $widget_saved_values["category_on_off"] ?? null,
            "info" => __("Category wise Service Filtering Hide/Show"),
        ]);

        $output .= Switcher::get([
            "name" => "subcategory_on_off",
            "label" => __("SubCategory"),
            "value" => $widget_saved_values["subcategory_on_off"] ?? null,
            "info" => __("SubCategory wise Service Filtering Hide/Show"),
        ]);

        $output .= Switcher::get([
            "name" => "child_category_on_off",
            "label" => __("Child Category"),
            "value" => $widget_saved_values["child_category_on_off"] ?? null,
            "info" => __("Child Category wise Service Filtering Hide/Show"),
        ]);

        $output .= Switcher::get([
            "name" => "rating_on_off",
            "label" => __("Rating Star"),
            "value" => $widget_saved_values["rating_on_off"] ?? null,
            "info" => __("Rating Star wise Service Filtering Hide/Show"),
        ]);

        $output .= Switcher::get([
            "name" => "sort_by_on_off",
            "label" => __("Sort By Star"),
            "value" => $widget_saved_values["sort_by_on_off"] ?? null,
            "info" => __("Sort By Service Filtering Hide/Show"),
        ]);
        // service filtering option on/off end

        $output .= Text::get([
            "name" => "country",
            "label" => __("Country Title Text"),
            "value" => $widget_saved_values["country"] ?? null,
        ]);

        $output .= Text::get([
            "name" => "city",
            "label" => __("City Title Text"),
            "value" => $widget_saved_values["city"] ?? null,
        ]);
        $output .= Text::get([
            "name" => "area",
            "label" => __("Area Title Text"),
            "value" => $widget_saved_values["area"] ?? null,
        ]);

        $output .= Text::get([
            "name" => "service_search_by_text",
            "label" => __("Search Title Text"),
            "value" => $widget_saved_values["service_search_by_text"] ?? null,
        ]);

        $output .= Text::get([
            "name" => "category",
            "label" => __("Category Title Text"),
            "value" => $widget_saved_values["category"] ?? null,
        ]);

        $output .= Text::get([
            "name" => "subcategory",
            "label" => __("Subcategory Title Text"),
            "value" => $widget_saved_values["subcategory"] ?? null,
        ]);

        $output .= Text::get([
            "name" => "child_category",
            "label" => __("Child Category Title Text"),
            "value" => $widget_saved_values["child_category"] ?? null,
        ]);

        $output .= Text::get([
            "name" => "book_now",
            "label" => __("Book Now Text"),
            "value" => $widget_saved_values["book_now"] ?? null,
        ]);
        $output .= Text::get([
            "name" => "read_more",
            "label" => __("View Details Text"),
            "value" => $widget_saved_values["read_more"] ?? null,
        ]);

        $output .= $this->admin_form_submit_button();
        $output .= $this->admin_form_end();
        $output .= $this->admin_form_after();

        return $output;
    }

    public function frontend_render()
    {
        $settings = $this->get_settings();
        $order_by = $settings["order_by"] ?? "";
        $IDorDate = $settings["order"] ?? "";
        $items = $settings["items"] ?? "";
        $columns = $settings["columns"] ?? "";
        $padding_top = $settings["padding_top"] ?? "";
        $padding_bottom = $settings["padding_bottom"] ?? "";

        //Service Filtering Hide/Show
        $country_on_off = $settings["country_on_off"] ?? "";
        $city_on_off = $settings["city_on_off"] ?? "";
        $area_on_off = $settings["area_on_off"] ?? "";
        $service_search_by_text_on_off =
            $settings["service_search_by_text_on_off"] ?? "";
        $category_on_off = $settings["category_on_off"] ?? "";
        $subcategory_on_off = $settings["subcategory_on_off"] ?? "";
        $child_category_on_off = $settings["child_category_on_off"] ?? "";
        $rating_star_on_off = $settings["rating_on_off"] ?? "";
        $sort_by_on_off = $settings["sort_by_on_off"] ?? "";

        $country_text = $settings["country"] ?? __("Select Country");
        $city_text = $settings["city"] ?? __("Select City");
        $area_text = $settings["area"] ?? __("Select Area");
        $search_placeholder =
            $settings["service_search_by_text"] ??
            __("What are you looking for?");

        $category_text = $settings["category"] ?? __("Select Category");
        $subcategory_text =
            $settings["subcategory"] ?? __("Select Subcategory");
        $child_category_text =
            $settings["child_category"] ?? __("Select Child Category");
        $book_now_text = $settings["book_now"] ?? __("Book Now");
        $read_more_text = $settings["read_more"] ?? __("View Details");

        $text_search_value = request()->get("q");
        $service_quyery = Service::query()->where("status", 1);
        $service_quyery->with("reviews","seller");

        // get country
        if (!empty(request()->get("country"))) {
            $service_country = Country::find(request()->get("country"));
            $service_country_ids = $service_country->cities
                ->pluck("id")
                ->toArray();
            $service_quyery
                ->whereIn("service_city_id", $service_country_ids)
                ->get();
        }


        // get city
        if (!empty(request()->get("city"))) {
            $service_quyery->where("service_city_id", request()->get("city"));
        }

        // get area
        if (!empty(request()->get("area"))) {
            $service_area = ServiceArea::find(request()->get("area"));
            $service_area =
                $service_area->city?->service_area?->service_city_id;
            $service_quyery->where("service_city_id", $service_area)->get();
        }

        if (!empty(request()->get("q"))) {
            $service_quyery
                ->where("title", "LIKE", "%" . request()->get("q") . "%")
                ->orWhere(
                    "description",
                    "LIKE",
                    "%" . request()->get("q") . "%"
                );
        }

        if (!empty(request()->get("cat"))) {
            $service_quyery->where("category_id", request()->get("cat"));
        }

        if (!empty(request()->get("subcat"))) {
            $service_quyery->where("subcategory_id", request()->get("subcat"));
        }

        if (!empty(request()->get("child_cat"))) {
            $service_quyery->where(
                "child_category_id",
                request()->get("child_cat")
            );
        }

        if (!empty(request()->get("rating"))) {
            $rating = (int) request()->get("rating");
            $service_quyery->whereHas("reviews", function ($q) use ($rating) {
                $q->groupBy("reviews.id")
                    ->havingRaw("AVG(reviews.rating) >= ?", [$rating])
                    ->havingRaw("AVG(reviews.rating) < ?", [$rating + 1]);
            });
        }

        $rating_stars = [
            "1" => __("One Star"),
            "2" => __("Two Star"),
            "3" => __("Three Star"),
            "4" => __("Four Star"),
            "5" => __("Five Star"),
        ];
        $search_by_rating_markup =
            '<option value=""> ' . __("Select Rating Star") . "</option>";
        foreach ($rating_stars as $value => $text) {
            $ratings_selection =
                !empty(request()->get("rating")) &&
                request()->get("rating") == $value
                    ? "selected"
                    : "";
            $search_by_rating_markup .=
                '<option value="' .
                $value .
                '" ' .
                $ratings_selection .
                " > " .
                $text .
                "</option>";
        }

        if (!empty(request()->get("sortby"))) {
            if (request()->get("sortby") == "latest_service") {
                $service_quyery->orderBy("id", "Desc");
            }
            if (request()->get("sortby") == "lowest_price") {
                $service_quyery->orderBy("price", "Asc");
            }
            if (request()->get("sortby") == "highest_price") {
                $service_quyery->orderBy("price", "Desc");
            }
            if (request()->get("sortby") == "best_selling") {
                $service_quyery->orderBy("sold_count", "Desc");
            }
            if (request()->get("sortby") == "featured") {
                $service_quyery->where("featured", 1);
            }
            if (request()->get("sortby") == "1") {
                $service_quyery->where("is_service_online", 1);
            }
        }


        $sortby_search = [
            "latest_service" => __("Latest Service"),
            "lowest_price" => __("Lowest Price"),
            "highest_price" => __("Highest Price"),
            "best_selling" => __("Best Selling Service"),
            "featured" => __("Featured Service"),
            "1" => __("Online Service"),
        ];
        $search_by_sort_markup =
            '<option value=""> ' . __("Sort By") . "</option>";
        foreach ($sortby_search as $value => $text) {
            $sortby_selection =
                !empty(request()->get("sortby")) &&
                request()->get("sortby") == $value
                    ? "selected"
                    : "";
            $search_by_sort_markup .=
                '<option value="' .
                $value .
                '" ' .
                $sortby_selection .
                " > " .
                $text .
                "</option>";
        }

        // get only offline service
        // if google map is active
        if (!empty(get_static_option('google_map_settings'))){
            $service_quyery->where("is_service_online", 0);
            $service_quyery->whereHas("seller", function ($q){
                $q->whereNotNull('latitude');
            });
        }

        $all_services = $service_quyery->where('status', 1)
            ->where('is_service_on', 1)
            //todo add filter for check seller has set his zone or not
            ->when(subscriptionModuleExistsAndEnable('Subscription'),function($q){
                $q->whereHas('seller_subscription');
            })->OrderBy($order_by,$IDorDate)->paginate($items);

        $countries = Country::select("id", "country")
            ->where("status", 1)
            ->get();
        $categories = Category::select("id", "name")
            ->where("status", 1)
            ->get();

        $service_markup = "";
        $country_markup = "";
        $service_city_markup = "";
        $service_area_markup = "";
        $category_markup = "";
        $sub_category_markup = "";
        $child_category_markup = "";
        $pagination = $all_services->links();
        $total_service = $all_services->total();
        //static text helpers
        $static_text = static_text();
        $no_service_found = __("No Service Found");

        if ($all_services->total() > 0) {
            foreach ($all_services as $service) {
                $image = render_background_image_markup_by_attachment_id(
                    $service->image,
                    "",
                    "",
                    "thumb"
                );
                $title = $service->title;
                $slug = $service->slug;
                $route = route("service.list.details", $slug);
                $book_now = route("service.list.book", $slug);
                $description = Str::limit(
                    strip_tags($service->description),
                    100
                );
                $price = amount_with_currency_symbol($service->price);
                $seller_image = render_image_markup_by_attachment_id(
                    optional($service->seller)->image,
                    "",
                    "",
                    "thumb"
                );
                $seller_name = optional($service->seller)->name;
                if ($service->featured == 1) {
                    $featured =
                        '<div class="award-icons"><i class="las la-award"></i></div>';
                } else {
                    $featured = "";
                }
                if ($service->is_service_online == 1) {
                    $service_service_location = __("Online Service");
                } else {
                    $service_service_location = sellerServiceLocation($service);
                }

                //calculate each service rating and count review
                $total_review = $service->reviews;
                $total_count = $total_review->where("type", 1)->count();
                $rating = round(
                    $total_review->where("type", 1)->avg("rating"),
                    1
                );
                $seller_profile = route(
                    "about.seller.profile",
                    optional($service->seller)->username
                );

                $rating_and_review = "";
                if ($rating >= 1) {
                    $rating_and_review .=
                        '<a href="javascript:void(0)">
            <span class="reviews">' .
                        ratting_star($rating) .
                        "(" .
                        $total_count .
                        ")" .
                        '</span>
        </a>';
                }

                $google_map_style_class = "";
                $map_showing_btn = "";
                if (!empty(get_static_option("google_map_settings"))) {
                    $google_map_style_class = "service-map-style";
                    $map_showing_btn = "d-none";
                }

                $starting = __("Starting at");
                $service_markup .= <<<SERVICES
        <div class="{$columns} col-md-6 margin-top-30">
        <div class="single-service {$google_map_style_class} no-margin wow fadeInUp" data-wow-delay=".2s">    
                <a href="{$route}" class="service-thumb service-bg-thumb-format" {$image}>                
                {$featured}
                <div class="country_city_location {$map_showing_btn}">
                    <span class="single_location"> <i class="las la-map-marker-alt"></i> {$service_service_location} </span>
                </div>
            </a>    
            <div class="services-contents">
                <ul class="author-tag">
                    <li class="tag-list">
                        <a href="{$seller_profile}">
                            <div class="authors">
                                <div class="thumb">
                                    {$seller_image}
                                    <span class="notification-dot"></span>
                                </div>
                                <span class="author-title"> {$seller_name} </span>
                            </div>
                        </a>
                    </li>
                    <li class="tag-list">
                        {$rating_and_review}
                    </li>
                </ul>    
                <h5 class="common-title"> <a href="{$route}"> {$title} </a> </h5>   
                <p class="common-para">{$description}</p>    
                <div class="service-price">
                    <span class="starting"> {$starting} </span>                    
                    <span class="prices">{$price}</span>    
                </div>
                <div class="btn-wrapper d-flex flex-wrap">
                    <a href="{$book_now}" class="cmn-btn btn-small btn-bg-1"> {$book_now_text} </a>
                    <a href="{$route}" class="cmn-btn {$map_showing_btn} btn-small btn-outline-1 ml-auto"> {$read_more_text} </a>
                </div>
            </div>
        </div>
    </div>
SERVICES;
            }
        } else {
            $service_markup .= <<<SERVICES
        <div class="col-lg-12 margin-top-30">
           <h5 class="common-title text-center text-danger"> {$no_service_found}</h5>
        </div>
SERVICES;
        }

        // country, city, area and text search start
        foreach ($countries as $cont) {
            $country = $cont->country;
            $country_id = $cont->id;
            $selected =
                !empty(request()->get("country")) &&
                request()->get("country") == $cont->id
                    ? "selected"
                    : "";

            $country_markup .= <<<COUNTRIES
<option {$selected} value="{$country_id}">{$country}</option>
COUNTRIES;
        }
        $country_id = request()->get("country");
        $services_city = ServiceCity::select("id", "service_city", "status")
            ->where("status", 1)
            ->where("country_id", $country_id)->get();

        foreach ($services_city as $service_city) {
            $service_city_name = $service_city->service_city;
            $service_city_id = $service_city->id;
            $selected = !empty(request()->get("city")) && request()->get("city") == $service_city->id  ? "selected" : "";

            $service_city_markup .= <<<SERVICECITY
     <option {$selected}  value="{$service_city_id}">{$service_city_name}</option>
SERVICECITY;
        }
        //service area
        $service_city_id = request()->get("city");
        $services_area = ServiceArea::select("id", "service_area", "status")
            ->where("status", 1)
            ->where("service_city_id", $service_city_id)
            ->get();

        // todo: first check if country and city is disable get area list
        if (empty($country_on_off && $city_on_off)){
            $services_area = ServiceArea::select("id", "service_area", "status")->where("status", 1)->get();
        }

        foreach ($services_area as $service_area) {
            $service_area_name = $service_area->service_area;
            $service_area_id = $service_area->id;
            $selected =
                !empty(request()->get("area")) &&
                request()->get("area") == $service_area->id
                    ? "selected"
                    : "";
            $service_area_markup .= <<<SERVICEAREA
            <option {$selected}  value="{$service_area_id}">{$service_area_name}</option>
SERVICEAREA;
        }
        // country, city, area and text search end

        foreach ($categories as $cat) {
            $category = $cat->name;
            $category_id = $cat->id;
            $selected =
                !empty(request()->get("cat")) &&
                request()->get("cat") == $cat->id
                    ? "selected"
                    : "";
            $category_markup .= <<<CATEGORIES
    <option {$selected} value="{$category_id}">{$category}</option>
CATEGORIES;
        }
        $category_id = request()->get("cat");
        $sub_categories = Subcategory::select("id", "name")
            ->where("status", 1)
            ->where("category_id", $category_id)
            ->get();

        foreach ($sub_categories as $sub_cat) {
            $sub_category = $sub_cat->name;
            $sub_category_id = $sub_cat->id;
            $selected =
                !empty(request()->get("subcat")) &&
                request()->get("subcat") == $sub_cat->id
                    ? "selected"
                    : "";
            $sub_category_markup .= <<<SUBCATEGORIES
    <option {$selected}  value="{$sub_category_id}">{$sub_category}</option>
SUBCATEGORIES;
        }

        //child category
        $sub_category_id = request()->get("subcat");
        $child_categories = ChildCategory::select("id", "name")
            ->where("status", 1)
            ->where("sub_category_id", $sub_category_id)
            ->get();

        foreach ($child_categories as $child_cat) {
            $child_category = $child_cat->name;
            $child_category_id = $child_cat->id;
            $selected =
                !empty(request()->get("child_cat")) &&
                request()->get("child_cat") == $child_cat->id
                    ? "selected"
                    : "";
            $child_category_markup .= <<<CHILDCATEGORY
    <option {$selected}  value="{$child_category_id}">{$child_category}</option>
CHILDCATEGORY;
        }
        $country_on_off_markup = "";
        $city_on_off_markup = "";
        $area_on_off_markup = "";
        $service_search_on_off_markup = "";
        $category_on_off_markup = "";
        $subcategory_on_off_markup = "";
        $child_category_on_off_markup = "";
        $rating_star_on_off_markup = "";
        $sort_by_on_off_markup = "";
        $google_map_markup = "";
        $google_map_view_markup = "";

        // google map class add
        if (!empty(get_static_option("google_map_settings"))) {
            $div_class_add = "col-lg-12";
        } else {
            $div_class_add = "col-lg-4 col-sm-6";
        }

        // google map wise service filter start
        if (!empty(get_static_option("google_map_settings"))) {
            $location_search_placeholder_text = get_static_option('google_map_search_placeholder_title') ?? __("Search Location here");

            // Home page autocomplete address
            $home_page_autocomplete_address = "";
            if (!empty(request()->get("autocomplete"))) {
                $home_page_autocomplete_address = request()->get(
                    "autocomplete"
                );
            }

            $google_map_markup .= <<<GOOGLEMAPAREA
          <div class="col-lg-12 d-none">
        <div class="single-category-service">
            <div class="single-input single-select">       
                <div class="single-input-inner">
                   <span class="single-input-icon"><i class="las la-search-location"></i> </span>                     
                   <input style="background-color: #fffbfb"
                    id="pac-input" type="text" class="search-input form-control gd_search_text controls" aria-label="Search for" autocomplete="off" value="{$home_page_autocomplete_address}"
                    placeholder="{$location_search_placeholder_text}">                         
                </div>   
            </div>   
        </div>
    </div>     
GOOGLEMAPAREA;
        }


        if ($country_on_off == "on") {
            $country_on_off_markup .= <<<COUNTRYONOFF
       <div class="{$div_class_add}">
        <div class="single-category-service">
            <div class="single-select">
                <select id="search_by_country" name="country">
                  <option value="">{$country_text}</option>
                  $country_markup
                </select>
            </div>
        </div>
    </div>
COUNTRYONOFF;
        }

        if ($city_on_off == "on") {
            $fetch_cities = "";
            if ($country_on_off !== "on") {

                // city id get
                $get_service_city_id = $all_services->pluck('service_city_id');
                $all_cities = ServiceCity::whereIn("id", $get_service_city_id)->where("status", 1)->get();

                foreach ($all_cities as $cities) {
                    $fetch_cities .=
                        "<option selected value=" .
                        $cities->id .
                        ">" .
                        $cities->service_city .
                        "</option>";
                }
            }

            $city_on_off_markup .= <<<CITYONOFF
          <div class="{$div_class_add}">
        <div class="single-category-service">
            <div class="single-select">
                <select id="search_by_city" name="city">                          
                  <option value=""> {$city_text}</option>
                   {$service_city_markup}
                   {$fetch_cities}
                </select>
            </div>
        </div>
    </div>
CITYONOFF;
        }

        if ($area_on_off == "on") {
            $area_on_off_markup .= <<<AREAONOFF
          <div class="{$div_class_add}">
        <div class="single-category-service">
            <div class="single-select">
                <select id="search_by_area" name="area">
                  <option value=""> {$area_text}</option>
                   {$service_area_markup}
                </select>
            </div>
        </div>
    </div>
AREAONOFF;
        }

        if ($service_search_by_text_on_off == "on") {
            $service_search_on_off_markup .= <<<SERVICESEARCHONOFF
          <div class="{$div_class_add}">
        <div class="single-category-service">
            <div class="single-select">       
               <input type="text" class="search-input form-control" id="search_by_query" placeholder="{$search_placeholder}" name="q" value="{$text_search_value}">        
            </div>
        </div>
    </div>
SERVICESEARCHONOFF;
        }

        if ($category_on_off == "on") {
            $category_on_off_markup .= <<<CATEGORYONOFF
          <div class="{$div_class_add}">
        <div class="single-category-service">
            <div class="single-select">
                <select id="search_by_category" name="cat">
                  <option value="">{$category_text}</option>
                  $category_markup
                </select>
            </div>
        </div>
    </div>
CATEGORYONOFF;
        }

        if ($subcategory_on_off == "on") {
            $subcategory_on_off_markup .= <<<SUBCATEGORYONOFF
          <div class="{$div_class_add}">
        <div class="single-category-service">
            <div class="single-select">
                <select id="search_by_subcategory" name="subcat">
                  <option value=""> {$subcategory_text}</option>
                   $sub_category_markup
                </select>
            </div>
        </div>
    </div>
SUBCATEGORYONOFF;
        }

        if ($child_category_on_off == "on") {
            $child_category_on_off_markup .= <<<CHILDCATEGORYONOFF
          <div class="{$div_class_add}">
            <div class="single-category-service">
                <div class="single-select">
                    <select id="search_by_child_category" name="child_cat">
                      <option value=""> {$child_category_text}</option>
                       $child_category_markup
                    </select>
                </div>
            </div>
        </div>
CHILDCATEGORYONOFF;
        }

        if ($rating_star_on_off == "on") {
            $rating_star_on_off_markup .= <<<RATINSTARGONOFF
      <div class="{$div_class_add}">
    <div class="single-category-service">
        <div class="single-select">
            <select id="search_by_rating" name="rating">
                    {$search_by_rating_markup}
            </select>
        </div>
    </div>
  </div>
RATINSTARGONOFF;
        }
        if ($sort_by_on_off == "on") {
            $sort_by_on_off_markup .= <<<RATINSTARGONOFF
      <div class="{$div_class_add}">
        <div class="single-category-service flex-category-service">
            <div class="single-select">
                <select id="search_by_sorting" name="sortby">
                    {$search_by_sort_markup}
                </select>
            </div>
        </div>
    </div>
RATINSTARGONOFF;
        }

        $current_page_url = URL::current();

        // google map section start
        if (!empty(get_static_option("google_map_settings"))) {
            $services = $all_services;
            $map_services = $services->makeHidden(["created_at", "updated_at"]);

            // asia Default  google map open
            $latitude = 34.047863;
            $longitude = 100.619655;

            // service return with image and price render
            $map_services_with_image_url = $map_services->map(function (
                $service
            ) {
                $imageUrl = render_background_image_markup_by_attachment_id(
                    $service->image
                );
                $service_main_price = custom_amount_with_currency_symbol(
                    $service->price
                );
                $service->image_url = $imageUrl;
                $service->service_main_price = $service_main_price;

                if ($service->is_service_online == 1) {
                    $service_service_location = __("Online Service");
                } else {
                     $service_service_location = sellerServiceLocation($service);
                }
                return $service;
            });


            $all_services_list_json = json_encode($map_services_with_image_url);
            $google_api_key = get_static_option("service_google_map_api_key");

            //route list
            $service_details_route = route("service.list.details", "");
            $service_book_route = route("service.list.book", "");



            // markup start
            $google_map_view_markup .= "   <script src=\"https://maps.googleapis.com/maps/api/js?key={$google_api_key}&libraries=places\">
      <script defer src=\"//cdn.jsdelivr.net/npm/markerclustererplus/dist/markerclusterer.min.js\"> </script>    
              
        <script defer>        
          function initialize() { 
              if( localStorage.getItem('latitude') && localStorage.getItem('longitude')){
               var latitude = localStorage.getItem('latitude');
               var longitude = localStorage.getItem('longitude');  
              }else{
                 var latitude = {$latitude}
                 var longitude = {$longitude}                
              }
                            
              var mapOptions = {
                  zoom: 2,
                  minZoom: 2,
                  maxZoom: 20,
                  zoomControl:true,
                  zoomControlOptions: {
                  style:google.maps.ZoomControlStyle.DEFAULT
                  },        
                   center: new google.maps.LatLng(latitude, longitude),         
                  mapTypeId: google.maps.MapTypeId.ROADMAP,
                  scrollwheel: true,
                  panControl:true,
                  mapTypeControl:true,
                  scaleControl:true,
                  overviewMapControl:true,
                  rotateControl:true,                    
              }            
             
              var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);   
              var image = new google.maps.MarkerImage(\"//docs.maptiler.com/openlayers/default-marker/marker-icon.png\", null, null, null, new google.maps.Size(40,52));
              var places = {$all_services_list_json}; 
              // same location multiple service show for add mix and max point set
              var min = .999999;
              var max = 1.000001;           
                                
              // Create and initialize the infowindow object google map search option
              var infowindow = new google.maps.InfoWindow(); 
              
              for(place in places){                  
                  place = places[place];  
                  
                
                  if(place.seller !== null){                           
                     // first check seller latitude and longitude not null                   
                     if(place.seller.latitude && place.seller.longitude){    
                          var marker = new google.maps.Marker({   
                              position: new google.maps.LatLng(place.seller.latitude * (Math.random() * (max - min) + min), place.seller.longitude * (Math.random() * (max - min) + min)),                      
                              map: map,
                              title: place.title,                                                   
                              icon: image,                                                 
                          });                              
                               // if click place icon zomm 20
                              google.maps.event.addListener(marker, 'click', (function (marker, place) {      
                                  return function () {
                                      map.setZoom(20);                                    
                                      infowindow.setContent(generateContent(place));       
                                      infowindow.open(map, marker);     
                                  }
                              })(marker, place));                            
                       }    
                    }
              }    
              
              
                 //==================== autocomplete address  search start========================   
                  const geocoder = new google.maps.Geocoder();
                 // const marker = new google.maps.Marker({ map: map });         
                   const input = document.getElementById(\"pac-input\");                                    
                  // Specify just the place data fields that you need.
                  const autocomplete = new google.maps.places.Autocomplete(input, {
                      fields: [\"place_id\", \"geometry\", \"name\", \"formatted_address\"],
                  });      
                           
                  
                   
                  autocomplete.bindTo(\"bounds\", map);   
                  const infowindowContent = document.getElementById(\"infowindow-content\");   
                   infowindow.setContent(infowindowContent);  
                  
                  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);                  
                  var storedPlaceId = getCookie('placeId');     
                  
                    if (storedPlaceId) {
                      // Create a new place object with the stored place ID
                      var storedPlace = {
                        place_id: storedPlaceId,
                      };         
                      
                      // Set the value of the autocomplete input with the stored place's formatted address  
                    $('#pac-input').val(getCookie('address'));                  
                        // Manually call the event handler function for 'place_changed' event
                          placeChangedHandler(storedPlace); 
                    }      
                    
              autocomplete.addListener(\"place_changed\", () => {
                  infowindow.close();     
                  const place = autocomplete.getPlace(); 
                  
                    if (!place.place_id) {
                        return;     
                      }                         
                          geocoder.geocode({ placeId: place.place_id })
                        .then(({ results }) => {                                
                          map.setZoom(20);
                          map.setCenter(results[0].geometry.location);                
                          marker.setPlace({
                            placeId: place.place_id,
                            location: results[0].geometry.location,
                          });                                           
                          // Store the place data in cookies
                            document.cookie = `placeName={encodeURIComponent(place.place_id)}`;
                            document.cookie = `placeName={encodeURIComponent(place.name)}`;
                            document.cookie = `placeAddress={encodeURIComponent(place.formatted_address)}`;    
                          marker.setVisible(true);    
                           return function () { }                                              
                        })                   
                        .catch((e) => window.alert(\"Geocoder failed due to: \" + e)); 
                        });
                        
                        // autocomplete address find service
                        function placeChangedHandler(place) {
                          const event = {
                            stop: null,
                            place: place,
                          };
                             geocoder.geocode({ placeId: place.place_id })
                            .then(({ results }) => {    
                                
                              map.setZoom(20);
                              map.setCenter(results[0].geometry.location);                
                              marker.setPlace({
                                placeId: place.place_id,
                                location: results[0].geometry.location,
                              });        
                              marker.setVisible(true);                                 
                               return function () {}                                    
                            })                            
                          google.maps.event.trigger(autocomplete, 'place_changed', event);
                        }                    
              //==================== autocomplete address  search end ========================
          }
          google.maps.event.addDomListener(window, 'load', initialize);   
    
          function generateContent(place){                  
              var content = `<div class=\"single-service service-map-style no-margin wow\">    
                  <a href=\"{$service_details_route}/`+place.slug+`\" class=\"service-thumb service-bg-thumb-format\" `+place.image_url+`>    
              </a>    
              <div class=\"services-contents\">                    
                  <h5 class=\"common-title map-view-service-title mt-2\"> <a href=\"{$service_details_route}/`+place.slug+`\" title=\"View: `+place.title+`\"> `+place.title+` </a> </h5>                 
                  <div class=\"service-price\">
                      <span class=\"starting\"> Starting at </span>                    
                      <span class=\"prices\">`+place.service_main_price+`</span>    
                  </div>
                  <div class=\"btn-wrapper d-flex flex-wrap\">
                      <a href=\"{$service_book_route}/`+place.slug+`\" class=\"cmn-btn btn-small btn-bg-1\"> {$book_now_text} </a>                                   
                  </div>
              </div>
          </div>`;           
  
              return content;
          }          
 </script>";
// markup end
        }

        $all_service_section_markup = "";
        if (!empty(get_static_option("google_map_settings"))) {
            $all_service_section_markup .= <<<ALLSERVICESECTIONMARKUP
  <form method="get" action="{$current_page_url}" id="search_service_list_form">
     <div class="row g-4">
         <div class="col-lg-3">
             <div class="row">
                 {$google_map_markup}   
                 {$country_on_off_markup}               
                 {$city_on_off_markup}                   
                 {$area_on_off_markup} 
                 {$service_search_on_off_markup} 
                 {$category_on_off_markup} 
                 {$subcategory_on_off_markup} 
                 {$child_category_on_off_markup} 
                 {$rating_star_on_off_markup} 
                 {$sort_by_on_off_markup} 
             </div>
         </div>
         <div class="col-lg-9">
             <div class="row" id="all_search_result">
                 <div class="col-lg-12">
                     <!--google map section start -->
                     <div class="service-locationMap">
                         <div class="fullwidth-sidebar-container">
                             <div class="sidebar top-sidebar">
                                 <div id="map-canvas" style="height: 400px; width: 100%; position: relative; overflow: hidden;">                                             
                                 </div>                                            
                             </div>
                         </div>
                     </div>
                 </div>
                 <!--google map section end -->
                 {$service_markup}
                 <div class="col-lg-12">
                     <div class="blog-pagination margin-top-55">
                         <div class="custom-pagination mt-4 mt-lg-5">
                             {$pagination}
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>            
 </form> 
ALLSERVICESECTIONMARKUP;
        } else {
            $all_service_section_markup .= <<<ALLSERVICESECTIONMARKUP
 <form method="get" action="{$current_page_url}" id="search_service_list_form">              
                <div class="row">                
                {$google_map_markup}               
                {$country_on_off_markup}               
                {$city_on_off_markup}                   
                {$area_on_off_markup} 
                {$service_search_on_off_markup} 
                {$category_on_off_markup} 
                {$subcategory_on_off_markup} 
                {$child_category_on_off_markup} 
                {$rating_star_on_off_markup} 
                {$sort_by_on_off_markup} 
                </div>            
            </form>
            <div class="row margin-top-20" id="all_search_result">
                {$service_markup}
                <div class="col-lg-12">
                    <div class="blog-pagination margin-top-55">
                        <div class="custom-pagination mt-4 mt-lg-5">
                            {$pagination}
                        </div>
                    </div>
                </div>
            </div>
ALLSERVICESECTIONMARKUP;
        }

        // google map section end
        return <<<HTML
    <!-- Category Service area starts -->
    <section class="category-services-area" data-padding-top="{$padding_top}" data-padding-bottom="{$padding_bottom}">
        <div class="container">
            {$all_service_section_markup}    
        </div>
    </section>   
    {$google_map_view_markup} 
HTML;
    }

    public function addon_title()
    {
        return __("Service List: 1");
    }
}
