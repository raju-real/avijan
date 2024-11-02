<?php

use App\Models\Article;
use App\Models\Faq;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\EventPhoto;
use App\Models\SliderView;
use Illuminate\Support\Str;
use App\Models\EventCategory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Intervention\Image\Facades\Image;

/**
 * Required sign for from label
 */
if (!function_exists('starSign')) {
    function starSign(): string
    {
        return "<span class='text-danger'>" . " *" . "</span>";
    }
}

/**
 * Return saved message with type
 */
if (! function_exists('savedMessage')) {
    function savedMessage($message = "Information has been saved savedfully!"): array
    {
        return [
            'type' => 'primary',
            'message' => $message
        ];
    }
}

/**
 * Return delete message with type
 */
if (! function_exists('updateMessage')) {
    function updateMessage($message = "Information has been updated successfully!"): array
    {
        return [
            'type' => 'info',
            'message' => $message
        ];
    }
}

/**
 * Return delete message with type
 */
if (! function_exists('deleteMessage')) {
    function deleteMessage($message = "Information has been deleted successfully!"): array
    {
        return [
            'type' => 'warning',
            'message' => $message
        ];
    }
}

/**
 * Return warning message
 */
if (! function_exists('warningMessage')) {
    function warningMessage($message = "Something is wrong!"): array
    {
        return [
            'type' => 'warning',
            'message' => $message
        ];
    }
}

/**
 * Return warning message
 */
if (! function_exists('dangerMessage')) {
    function dangerMessage($message = "Something is wrong!"): array
    {
        return [
            'type' => 'danger',
            'message' => $message
        ];
    }
}

/**
 * Fetch Username by id
 */
if (! function_exists('userNameById')) {
    function userNameById($id): string
    {
        return \App\Models\User::find($id)->name ?? "N/A";
    }
}

/**
 * Return string with limit
 */
if (! function_exists('strLimit')) {
    function strLimit($string, $length = 50)
    {
        return Str::limit($string, $length, '...');
    }
}

/**
 * Upload image
 */
if (! function_exists('uploadImage')) {
    function uploadImage($file, $path = "assets/files/", $width = "", $height = "", $size = "", $name = ""): string
    {
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }
        $imageName = $name . "-" . time() . $file->getClientOriginalName();
        $image = Image::make($file->getPathname());
        if ((isset($height)) and (isset($width))) {
            $image->resize($width, $height);
        }
        if (isset($size)) {
            $image->filesize($size);
        }
        $image->save($path . $imageName);
        return $path . $imageName;
    }
}

/**
 * Check file is image
 */
if (! function_exists('isImage')) {
    function isImage($file)
    {
        $file_type = $file->getClientMimeType();
        $text = explode('/', $file_type)[0];
        if ($text == "image") {
            return true;
        } else {
            return false;
        }
    }
}

/**
 * Get file extension
 */
if (! function_exists('fileExtension')) {
    function fileExtension($file)
    {
        if (isset($file)) {
            return $file->getClientOriginalExtension();
        } else {
            return "Inalid file";
        }
    }
}

/**
 * Get file type
 */
if (! function_exists('imageWidthHeight')) {
    function imageWidthHeight($image)
    {
        $img_size_array = getimagesize($image);
        $width = $img_size_array[0];
        $height = $img_size_array[1];
        return array('width' => $width, 'height' => $height);
    }
}

/**
 * Get path image info
 */
if (! function_exists('pathImageInfo')) {
    function pathImageInfo($path)
    {
        $image = Image::make($path);
        return [
            'type' => explode('/', $image->mime())[0],
            'extension' => explode('/', $image->mime())[1],
            'height' => $image->height(),
            'width' => $image->width(),
        ];
    }
}

/**
 * Upload file
 */
if (! function_exists('uploadFile')) {
    function uploadFile($file, $path = "assets/files/"): string
    {
        $uniqueFileName = $file->getClientOriginalName() . '-' . time() . '-' . '.' . $file->getClientOriginalExtension();
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }
        $file->move($path, $uniqueFileName);
        return $path . $uniqueFileName;
    }
}

/**
 * Get blood group list
 */
if (! function_exists('bloodGroups')) {
    function bloodGroups(): array
    {
        return ["A+", "A-", "B+", "B-", "O+", "O-", "AB+", "AB-"];
    }
}

/**
 * Return error message with text danger
 */
if (!function_exists('displayError')) {
    function displayError(string $error = "Something went wrong!")
    {
        return "<span class='invalid-feedback' role='alert'><strong>" . $error . "</strong></span>";
    }
}

/**
 * Check field has error or not
 */
if (!function_exists('hasError')) {
    function hasError(string $fieldName)
    {
        // Access the current request's validation errors
        $errors = session()->get('errors');
        // Check if there are any errors for the specified field
        return $errors && $errors->has($fieldName) ? 'is-invalid' : '';
    }
}

/**
 * Return a spinner icon
 */
if (!function_exists('commonSpinner')) {
    function commonSpinner()
    {
        return "<i class='fa fa-spinner fa-spin me-2 spinner d-none'></i>";
    }
}

/**
 * Return string with limit
 */
if (! function_exists('strLimit')) {
    function strLimit($string, $length = 50)
    {
        return Str::limit($string, $length, '...');
    }
}

/**
 * Return route specific
 */
if (! function_exists('routeNeed')) {
    function routeNeed($route, $need)
    {
        if ($need == "method") {
            return optional(Route::getRoutes()->getByName($route))->getActionMethod();
        }
    }
}


/**
 * Format date
 */
if (!function_exists('formatDate')) {
    function formatDate($date, $format = "Y-m-d")
    {
        return date($format, strtotime($date));
    }
}

if (! function_exists('encrypt_decrypt')) {
    function encrypt_decrypt($key, $type)
    {
        $str_rand = "OipQx4ehQqG5b9a";
        if (!$key) {
            return false;
        }
        if ($type == 'decrypt') {
            $en_slash_added1 = trim(str_replace(array('mkgroup'), '/', $key));
            $en_slash_added = trim(str_replace(array('mkgroupbd'), '%', $en_slash_added1));
            $key_value = openssl_decrypt($en_slash_added, "AES-128-ECB", $str_rand);
            return $key_value;
        } elseif ($type == 'encrypt') {
            $key_value = openssl_encrypt($key, "AES-128-ECB", $str_rand);
            $en_slash_remove1 = trim(str_replace(array('/'), 'mkgroup', $key_value));
            $en_slash_remove = trim(str_replace(array('%'), 'mkgroupbd', $en_slash_remove1));
            return $en_slash_remove;
        }
        return FALSE;    # if function is not used properly
    }
}


// Website common
if (!function_exists('siteSetting')) {
    function siteSetting()
    {
        if (file_exists('assets/json/site_setting.json')) {
            $jsonString = File::get('assets/json/site_setting.json');
            return json_decode($jsonString, true);
        } else {
            return "";
        }
    }
}

if (!function_exists('eventCategories')) {
    function eventCategories()
    {
        return EventCategory::orderBy('name')->select('id', 'name', 'slug')->get();
    }
}

if (! function_exists('sliderImagesOld')) {
    function sliderImagesOld()
    {

        $events = EventPhoto::where('display_on_slider', 1)
            ->select('title', 'photo_path', 'display_on_slider', 'event_id')
            ->with('event:id,slug') // Load the event relationship and only the 'id' and 'slug' columns
            ->get()
            ->map(function ($item) {
                $item->type = 'event';
                $item->slug = $item->event->slug ?? null; // Add slug from the related Event model
                return $item->only(['title', 'photo_path', 'type', 'slug']);
            })->toArray();

        $sliders = Gallery::where('display_on_slider', 1)
            ->select('title', 'photo_path', 'display_on_slider')
            ->get()
            ->map(function ($item) {
                $item->type = 'gallery';
                return $item->only(['title', 'photo_path', 'type']);
            })->toArray();

        return collect(array_merge($events, $sliders));
    }
}

if (! function_exists('sliderImages')) {
    function sliderImages()
    {
        return SliderView::orderBy('updated_at','desc')->get();
    }
}

if (! function_exists('upcommingEvents')) {
    function upcommingEvents()
    {
        return Event::where('event_type', 'UPCOMING')->where('status', 1)->get();
    }
}
if (! function_exists('completeEvents')) {
    function completeEvents()
    {
        return Event::where('event_type', 'COMPLETE')->where('status', 1)->get();
    }
}
if (! function_exists('allFaqs')) {
    function allFaqs()
    {
        return Faq::where('status', 1)->get();
    }
}

if (! function_exists('allArticles')) {
    function allArticles()
    {
        return Article::where('status', 1)->latest()->paginate(100);
    }
}
if (! function_exists('webArticles')) {
    function webArticles()
    {
        return Article::where('status', 1)->latest()->take(8)->get();
    }
}
