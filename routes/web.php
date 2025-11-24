<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WelcomeController;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/', function () {
    return view('welcome');
          //return view('auth/login');
});

Route::group(['middleware' => ['cabecerasseguras'], 'namespace' => '\\'], function(){

  Route::post('/login', '\App\Http\Controllers\Auth\LoginController@authenticate')->name('login');
  Route::post('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
});


Route::get('/registrar' , [WelcomeController::class, 'index']);
Route::post('/registrar' , [WelcomeController::class, 'Registrar']);
Route::get('/verificar/{id}' , [WelcomeController::class, 'verificar']);
Route::post('/verificar' , [WelcomeController::class, 'verificarUser']);
Route::post('/reenviar' , [WelcomeController::class, 'reenviarCodigo']);

Route::group(["middleware" => ['auth:sanctum', 'verified','web']], function(){

  Route::get('dashboard', [HomeController::class, 'index']);
  Route::post('/actualizar' , [HomeController::class, 'actualizar']);
  Route::post('/loginAs' , [HomeController::class, 'as2']);
  Route::post('/terminal', [TerminalController::class, 'executeCommand']);
  Route::get('send-mail', [MailController::class, 'index']);
  //Route::post('/usuarios/loginAs' , [HomeController::class, 'as2']);

});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return Inertia::render('Dashboard');
//     })->name('dashboard');
//
//     Route::post('/actualizar' , [HomeController::class, 'actualizar']);
// });


Route::view('index', '/example/index')->name('index');
Route::view('project_dashboard', '/example/project_dashboard')->name('project_dashboard');
Route::view('crypto_dashboard', '/example/crypto_dashboard')->name('crypto_dashboard');
Route::view('education_dashboard', '/example/education_dashboard')->name('education_dashboard');

Route::view('accordions', '/example/accordions')->name('accordions');
Route::view('add_blog', '/example/add_blog')->name('add_blog');
Route::view('add_product', '/example/add_product')->name('add_product');
Route::view('advance_table', '/example/advance_table')->name('advance_table');
Route::view('alert', '/example/alert')->name('alert');
Route::view('alignment', '/example/alignment')->name('alignment');
Route::view('animated_icon', '/example/animated_icon')->name('animated_icon');
Route::view('animation', '/example/animation')->name('animation');
Route::view('api', '/example/api')->name('api');
Route::view('area_chart', '/example/area_chart')->name('area_chart');
Route::view('avatar', '/example/avatar')->name('avatar');

Route::view('background', '/example/background')->name('background');
Route::view('badges', '/example/badges')->name('badges');
Route::view('bar_chart', '/example/bar_chart')->name('bar_chart');
Route::view('base_inputs', '/example/base_inputs')->name('base_inputs');
Route::view('basic_table', '/example/basic_table')->name('basic_table');
Route::view('blank', '/example/blank')->name('blank');
Route::view('block_ui', '/example/block_ui')->name('block_ui');
Route::view('blog', '/example/blog')->name('blog');
Route::view('blog_details', '/example/blog_details')->name('blog_details');
Route::view('bookmark', '/example/bookmark')->name('bookmark');
Route::view('bootstrap_slider', '/example/bootstrap_slider')->name('bootstrap_slider');
Route::view('boxplot_chart', '/example/boxplot_chart')->name('boxplot_chart');
Route::view('bubble_chart', '/example/bubble_chart')->name('bubble_chart');
Route::view('bullet', '/example/bullet')->name('bullet');
Route::view('buttons', '/example/buttons')->name('buttons');

Route::view('calendar', '/example/calendar')->name('calendar');
Route::view('candlestick_chart', '/example/candlestick_chart')->name('candlestick_chart');
Route::view('cards', '/example/cards')->name('cards');
Route::view('cart', '/example/cart')->name('cart');
Route::view('chart_js', '/example/chart_js')->name('chart_js');
Route::view('chat', '/example/chat')->name('chat');
Route::view('cheatsheet', '/example/cheatsheet')->name('cheatsheet');
Route::view('checkbox_radio', '/example/checkbox_radio')->name('checkbox_radio');
Route::view('checkout', '/example/checkout')->name('checkout');
Route::view('clipboard', '/example/clipboard')->name('clipboard');
Route::view('collapse', '/example/collapse')->name('collapse');
Route::view('column_chart', '/example/column_chart')->name('column_chart');
Route::view('coming_soon', '/example/coming_soon')->name('coming_soon');
Route::view('count_down', '/example/count_down')->name('count_down');
Route::view('count_up', '/example/count_up')->name('count_up');

Route::view('data_table', '/example/data_table')->name('data_table');
Route::view('date_picker', '/example/date_picker')->name('date_picker');
Route::view('default_forms', '/example/default_forms')->name('default_forms');
Route::view('divider', '/example/divider')->name('divider');
Route::view('draggable', '/example/draggable')->name('draggable');
Route::view('dropdown', '/example/dropdown')->name('dropdown');
Route::view('dual_list_boxes', '/example/dual_list_boxes')->name('dual_list_boxes');

Route::view('editor', '/example/editor')->name('editor');
Route::view('email', '/example/email')->name('email');
Route::view('error_400', '/example/error_400')->name('error_400');
Route::view('error_403', '/example/error_403')->name('error_403');
Route::view('error_404', '/example/error_404')->name('error_404');
Route::view('error_500', '/example/error_500')->name('error_500');
Route::view('error_503', '/example/error_503')->name('error_503');

Route::view('faq', '/example/faq')->name('faq');
Route::view('file_manager', '/example/file_manager')->name('file_manager');
Route::view('file_upload', '/example/file_upload')->name('file_upload');
Route::view('flag_icons', '/example/flag_icons')->name('flag_icons');
Route::view('floating_labels', '/example/floating_labels')->name('floating_labels');
Route::view('fontawesome', '/example/fontawesome')->name('fontawesome');
Route::view('footer_page', '/example/footer_page')->name('footer_page');
Route::view('form_validation', '/example/form_validation')->name('form_validation');
Route::view('form_wizard_1', '/example/form_wizard_1')->name('form_wizard_1');
Route::view('form_wizard_2', '/example/form_wizard_2')->name('form_wizard_2');
Route::view('form_wizards', '/example/form_wizards')->name('form_wizards');

Route::view('gallery', '/example/gallery')->name('gallery');
Route::view('google_map', '/example/google_map')->name('google_map');
Route::view('grid', '/example/grid')->name('grid');

Route::view('heatmap', '/example/heatmap')->name('heatmap');
Route::view('helper_classes', '/example/helper_classes')->name('helper_classes');

Route::view('iconoir_icon', '/example/iconoir_icon')->name('iconoir_icon');
Route::view('input_groups', '/example/input_groups')->name('input_groups');
Route::view('input_masks', '/example/input_masks')->name('input_masks');
Route::view('invoice', '/example/invoice')->name('invoice');

Route::view('kanban_board', '/example/kanban_board')->name('kanban_board');

Route::view('landing', '/example/landing')->name('landing');
Route::view('leaflet_map', '/example/leaflet_map')->name('leaflet_map');
Route::view('line_chart', '/example/line_chart')->name('line_chart');
Route::view('list', '/example/list')->name('list');
Route::view('list_table', '/example/list_table')->name('list_table');
Route::view('lock_screen', '/example/lock_screen')->name('lock_screen');
Route::view('lock_screen_1', '/example/lock_screen_1')->name('lock_screen_1');


Route::view('maintenance', '/example/maintenance')->name('maintenance');
Route::view('misc', '/example/misc')->name('misc');
Route::view('mixed_chart', '/example/mixed_chart')->name('mixed_chart');
Route::view('modals', '/example/modals')->name('modals');
Route::view('notifications', '/example/notifications')->name('notifications');

Route::view('offcanvas', '/example/offcanvas')->name('offcanvas');
Route::view('orders', '/example/orders')->name('orders');
Route::view('order_details', '/example/order_details')->name('order_details');
Route::view('order_list', '/example/order_list')->name('order_list');

Route::view('password_create_1', '/example/password_create_1')->name('password_create_1');
Route::view('password_reset_1', '/example/password_reset_1')->name('password_reset_1');
Route::view('phosphor', '/example/phosphor')->name('phosphor');
Route::view('pie_charts', '/example/pie_charts')->name('pie_charts');
Route::view('placeholder', '/example/placeholder')->name('placeholder');
Route::view('pricing', '/example/pricing')->name('pricing');
Route::view('prismjs', '/example/prismjs')->name('prismjs');
Route::view('privacy_policy', '/example/privacy_policy')->name('privacy_policy');
Route::view('product', '/example/product')->name('product');
Route::view('product_details', '/example/product_details')->name('product_details');
Route::view('product_list', '/example/product_list')->name('product_list');
Route::view('profile', '/example/profile')->name('profile');
Route::view('progress', '/example/progress')->name('progress');
Route::view('project_app', '/example/project_app')->name('project_app');
Route::view('project_details', '/example/project_details')->name('project_details');
Route::view('password_create', '/example/password_create')->name('password_create');
Route::view('password_reset', '/example/password_reset')->name('password_reset');

Route::view('radar_chart', '/example/radar_chart')->name('radar_chart');
Route::view('radial_bar_chart', '/example/radial_bar_chart')->name('radial_bar_chart');
Route::view('range_slider', '/example/range_slider')->name('range_slider');
Route::view('ratings', '/example/ratings')->name('ratings');
Route::view('read_email', '/example/read_email')->name('read_email');
Route::view('ready_to_use_form', '/example/ready_to_use_form')->name('ready_to_use_form');
Route::view('ready_to_use_table', '/example/ready_to_use_table')->name('ready_to_use_table');
Route::view('ribbons', '/example/ribbons')->name('ribbons');

Route::view('scatter_chart', '/example/scatter_chart')->name('scatter_chart');
Route::view('scrollbar', '/example/scrollbar')->name('scrollbar');
Route::view('scrollpy', '/example/scrollpy')->name('scrollpy');
Route::view('select', '/example/select')->name('select');
Route::view('setting', '/example/setting')->name('setting');
Route::view('shadow', '/example/shadow')->name('shadow');
Route::view('sign_in', '/example/sign_in')->name('sign_in');
Route::view('sign_in_1', '/example/sign_in_1')->name('sign_in_1');
Route::view('sign_up', '/example/sign_up')->name('sign_up');
Route::view('sign_up_1', '/example/sign_up_1')->name('sign_up_1');
Route::view('sitemap', '/example/sitemap')->name('sitemap');
Route::view('slick_slider', '/example/slick_slider')->name('slick_slider');
Route::view('spinners', '/example/spinners')->name('spinners');
Route::view('sweetalert', '/example/sweetalert')->name('sweetalert');
Route::view('switch', '/example/switch')->name('switch');

Route::view('tabler_icons', '/example/tabler_icons')->name('tabler_icons');
Route::view('tabs', '/example/tabs')->name('tabs');
Route::view('team', '/example/team')->name('team');
Route::view('terms_condition', '/example/terms_condition')->name('terms_condition');
Route::view('textarea', '/example/textarea')->name('textarea');
Route::view('ticket', '/example/ticket')->name('ticket');
Route::view('ticket_details', '/example/ticket_details')->name('ticket_details');
Route::view('timeline', '/example/timeline')->name('timeline');
Route::view('timeline_range_charts', '/example/timeline_range_charts')->name('timeline_range_charts');
Route::view('to_do', '/example/to_do')->name('to_do');
Route::view('tooltips_popovers', '/example/tooltips_popovers')->name('tooltips_popovers');
Route::view('touch_spin', '/example/touch_spin')->name('touch_spin');
Route::view('tour', '/example/tour')->name('tour');
Route::view('tree-view', '/example/tree-view')->name('tree-view');
Route::view('treemap_chart', '/example/treemap_chart')->name('treemap_chart');
Route::view('two_step_verification', '/example/two_step_verification')->name('two_step_verification');
Route::view('two_step_verification_1', '/example/two_step_verification_1')->name('two_step_verification_1');
Route::view('typeahead', '/example/typeahead')->name('typeahead');

Route::view('vector_map', '/example/vector_map')->name('vector_map');
Route::view('video_embed', '/example/video_embed')->name('video_embed');
Route::view('weather_icon', '/example/weather_icon')->name('weather_icon');
Route::view('widget', '/example/widget')->name('widget');
Route::view('wishlist', '/example/wishlist')->name('wishlist');
Route::view('wrapper', '/example/wrapper')->name('wrapper');
