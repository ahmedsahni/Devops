<?php
//Including DATABASE file config.php.
require 'app/database/config.php';


//Session starting.
session_start();

/**
 * Including vendor Library autoload.php for Fast-Route for paths.
 * Including main functions.php file.
 * Including views.php file where we are calling the frontend views functions.
 */
require 'vendor/autoload.php';
require 'app/core/functions.php';
require 'app/core/views.php';


//Starting FastRoute Library
use FastRoute\RouteCollector;


$dispatcher = FastRoute\simpleDispatcher(function (RouteCollector $r) {

 $r->addRoute('GET', MDIR.'500', 'get_500_error_view');

     
       
        
         $r->addRoute('GET', MDIR.'login', 'get_login_view');
         $r->addRoute('POST', MDIR . 'auth/login', 'handle_login');
         $r->addRoute('GET', MDIR.'register', 'get_register_view');
         $r->addRoute('POST', 'auth/register', 'handle_Register');
         $r->addRoute('GET', MDIR . 'logout', 'logout_user');
         $r->addRoute('GET', MDIR . 'clearlogs', 'clear_traffic_logs');

         $r->addRoute('POST', MDIR . 'start-logs', 'startLogsHandler');
         $r->addRoute('POST', MDIR . 'start-model', 'startModelHandler');
         $r->addRoute('POST', MDIR . 'stop-logs', 'stopLogsHandler');

         $r->addRoute('GET', MDIR . 'get-intrusion-chart-data', 'get_intrusion_chart_data');


        
        $r->addRoute('GET', MDIR . 'dashboard', 'get_dashboard');
    //      $r->addRoute('GET', MDIR.'crons/halo-sync-items', 'halo_api_sync_items_services_view');
    //      $r->addRoute('GET', MDIR.'crons/halo-sync-software','halo_api_sync_items_software_view');
    //      $r->addRoute('GET', MDIR.'crons/gdpr-email-followup','check_gdpr_status_for_emails_view');
    //      $r->addRoute('GET', MDIR.'crons/gdpr-check-email-and-create-ticket','check_gdpr_email_status_and_create_ticket_view');
    //      $r->addRoute('GET', MDIR.'crons/quote-email-followup','check_quotation_status_for_emails_view');
    //      $r->addRoute('GET', MDIR.'crons/quote-check-email-and-create-ticket','check_quotation_email_status_and_create_ticket_view');
    //      /**
    //       * Admin routes
    //       */
    //      $r->addRoute('GET', MDIR . 'admin/quotation/edit/{id}', checkSession('user_id', 'get_quotation_edit_view_admin_step1'));
    //      $r->addRoute('GET', MDIR . 'admin/quotations/edit/step2/{id}', checkSession('user_id', 'get_quotation_edit_view_admin_step2'));
    //      $r->addRoute('GET', MDIR . 'admin/quotations/edit/step3/{id}', checkSession('user_id', 'get_quotation_edit_view_admin_step3'));
    //      $r->addRoute('POST', MDIR . 'quotations/savestep1/{id}', checkSession('user_id', 'quotation_save_edit_step1_package'));
    //      $r->addRoute('GET', MDIR . 'admin/quotations/view/{id}', checkSession('user_id', 'admin_quotation_view'));
    //     /**
    //       * Client routes
    //       */
    //       $r->addRoute('GET', MDIR . 'quotations', checkSession('user_id', 'get_quotations_client_view'));//client-view page

    //       $r->addRoute('GET', MDIR . 'seller/quotations/view/{id}', 'client_quotation_view');
    //       $r->addRoute('GET', MDIR . 'seller/quotations/edit/{id}', checkSession('user_id', 'get_quotation_edit_view_client_step1'));
    //       $r->addRoute('GET', MDIR . 'seller/quotations/step2/{id}', checkSession('user_id', 'get_quotation_edit_view_client_step2'));
    //       $r->addRoute('GET', MDIR . 'seller/quotations/step3/{id}', checkSession('user_id', 'get_quotation_edit_view_client_step3'));

    //      $r->addRoute('GET', MDIR, checkSession('user_id', 'get_dashboard'));
         
     
    //    /**
    //       * API ENDPOINTS
    //       */
    //      $r->addRoute('GET', MDIR . 'api/halo-customer-details',  checkApi('halo_get_customer_details_api'));
    //      $r->addRoute('GET', MDIR . 'api/search-companies',  checkApi('halo_search_companies'));
    //      $r->addRoute('POST', MDIR . 'api/quotations',  checkApi('quotation_save_data_in_db_view'));
    //      $r->addRoute('POST', MDIR . 'api/quotations/update',  checkApi('quotation_update_data_in_db_view'));
    //      $r->addRoute('POST', MDIR . 'api/admin/quotations/update',  'quotation_update_data_in_db_admin');
    //      $r->addRoute('GET', MDIR . 'api/quotations',  checkApi('quotation_get_data_in_db_view'));
    //      $r->addRoute('PUT', MDIR . 'api/quotations',  checkApi('quotation_update_data_in_db_view'));
    //      $r->addRoute('POST', MDIR . 'api/GDPR', checkApi('gdpr_mail_handler'));
    //      $r->addRoute('GET', MDIR. 'api/gdpr/verify/{token}', checkApi('validateUserHandler'));
    //      $r->addRoute('GET', MDIR . 'halo-gdpr-verification', 'validate_gdpr');
    //      $r->addRoute('POST', MDIR . 'api/admin/quotations/delete/{id}', checkSession('user_id', 'delete_quotation_by_id_admin'));
    //      $r->addRoute('GET', MDIR.'api/quotation/deny', 'deny_gdpr_consent_and_send_meeting_email');
    //      $r->addRoute('POST', MDIR.'api/authenticate', 'azure_store_user_session_api_view');
    //  /**
    //       * Quotation Routes
    //       */
        
    //      $r->addRoute('GET', MDIR . 'quotation/client/{token}', 'quotation_client_view');
    //      $r->addRoute('POST', MDIR . 'send-quotation', checkSession('user_id', 'sendQuotation'));
    //      $r->addRoute('POST', MDIR . 'generate-contract', checkSession('user_id', 'generateContract'));
    //      $r->addRoute('POST', MDIR . 'quotation/step1', checkSession('user_id', 'quotation_save_step1_data'));
    //      $r->addRoute('POST', MDIR . 'quotation/step2', checkSession('user_id', 'quotation_save_step2_data'));
    //      $r->addRoute('POST', MDIR . 'quotation/step3', checkSession('user_id', 'quotation_save_step3_data'));
    //      $r->addRoute('POST', MDIR . 'quotation/after_edit', checkSession('user_id', 'quotation_save_after_edit_data'));
     
         /**
          * GDPR Routes
          */
      
         $r->addRoute('GET', MDIR . 'gdpr/verify/{token}', 'get_gdpr_verify_page');
     
         /**
          * Azure SSO Login Routes
          * File Location : app/core/Azure/functions.php
          */
         $r->addRoute('GET', MDIR.'loginAzure', 'authenticate_azureuser');
         $r->addRoute('GET', MDIR.'AzureCallback', 'authenticate_azurecallback');
         $r->addRoute('GET', MDIR.'AzureError', 'authenticate_azure_error');
     
          /**
          * Contract Routes
          */
         $r->addRoute('GET', MDIR . 'test-contracts', 'test_get_contracts');
     
         //Testing purpose
         $r->addRoute('GET', MDIR.'test', 'testing');

         if(is_file('routes/test-routes.php'))
         {
             require 'routes/test-routes.php';
         }
     
     
    
    

 
});

// Fetch method and URI from the server variables
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

// Dispatch the request
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // 404 Not Found
        header("HTTP/1.0 404 Not Found");
        require 'app/views/error/404.php';
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        // 405 Method Not Allowed
        header("HTTP/1.0 405 Method Not Allowed");
        display_error("405 Method Not Allowed");
        break;
    case FastRoute\Dispatcher::FOUND:
        // Handle the request
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        call_user_func($handler, $vars);
        break;
        switch ($handler) {
    case 'logout_user':
        logout_user();
        break;

    // other cases...
}
        break;
        switch ($handler) {
    case 'show_login':
        show_login();
        break;

    case 'handle_login':
        handle_login();
        break;

    // other cases
}

}