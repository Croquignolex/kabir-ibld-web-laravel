<?php

//Global public folder (ngnix or apache)
const PUBLIC_FOLDER = 'public/assets';

//Asset path
if(!function_exists('asset_path'))
{
    /**
     * @param string $folder
     * @param $file
     * @param $extension
     * @return string
     */
    function asset_path($folder, $file, $extension)
    {
        return url(PUBLIC_FOLDER . $folder . $file . '.' . $extension);
    }
}

//Css asset path function
if(!function_exists('css_asset'))
{
    /**
     * @param $css_file
     * @param string $sub_folder
     * @return string
     */
    function css_asset($css_file, $sub_folder = '')
    {
        return asset_path('/css/' . $sub_folder, $css_file, 'css');
    }
}

//Js asset path function
if(!function_exists('js_asset'))
{
    /**
     * @param $js_file
     * @param string $sub_folder
     * @return string
     */
    function js_asset($js_file, $sub_folder = '')
    {
        return asset_path('/js/' . $sub_folder, $js_file, 'js');
    }
}

//Img asset path function
if(!function_exists('img_asset'))
{
    /**
     * @param $img_file
     * @param $extension
     * @param string $sub_folder
     * @return string
     */
    function img_asset($img_file, $extension = 'png', $sub_folder = '')
    {
        return asset_path('/img/' . $sub_folder, $img_file, $extension);
    }
}

//Css asset path function for app
if(!function_exists('css_app_asset'))
{
    /**
     * @param $css_file
     * @return string
     */
    function css_app_asset($css_file)
    {
        return css_asset($css_file, 'app/');
    }
}

//Js asset path function for app
if(!function_exists('js_app_asset'))
{
    /**
     * @param $js_file
     * @return string
     */
    function js_app_asset($js_file)
    {
        return js_asset($js_file, 'app/');
    }
}

//Css asset path function for admin
if(!function_exists('css_admin_asset'))
{
    /**
     * @param $css_file
     * @return string
     */
    function css_admin_asset($css_file)
    {
        return css_asset($css_file, 'admin/');
    }
}

//Js asset path function for app
if(!function_exists('js_admin_asset'))
{
    /**
     * @param $js_file
     * @return string
     */
    function js_admin_asset($js_file)
    {
        return js_asset($js_file, 'admin/');
    }
}

if(!function_exists('favicon_img_asset'))
{
    /**
     * @param $favicon
     * @return string
     */
    function favicon_img_asset($favicon)
    {
        return img_asset($favicon, 'png', 'favicon/');
    }
}
