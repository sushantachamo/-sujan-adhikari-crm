<?php
//site configuration
Route::get('site_config/edit', ['as' => 'site_config.edit', 'uses' => 'SiteConfigController@edit']);
Route::post('site_config', ['as' => 'site_config.update', 'uses' => 'SiteConfigController@update']);

Route::resource('roles', 'RoleController');
Route::post('roles/bulk-action', ['as' => 'roles.bulk-action', 'uses' => 'RoleController@bulkAction']);

Route::resource('users', 'UserController');
Route::post('users/bulk-action', ['as' => 'users.bulk-action', 'uses' => 'UserController@bulkAction']);

Route::resource('office', 'OfficeController');
Route::post('office/bulk-action', ['as' => 'office.bulk-action', 'uses' => 'OfficeController@bulkAction']);
Route::post('office/{id}', ['as' => 'office.restore', 'uses' => 'OfficeController@restore']);
Route::post('office/delete/{id}', ['as' => 'office.forcedelete', 'uses' => 'OfficeController@forceDelete']);
Route::post('officefile/delete-file', 'OfficeController@submitFileDelete')->name('officefile.fileDelete');
Route::post('officefetch/suggestion', 'OfficeController@fetchSuggestData')->name('office.fetchSuggestionData');

Route::resource('application', 'ApplicationController');
Route::post('application/bulk-action', ['as' => 'application.bulk-action', 'uses' => 'ApplicationController@bulkAction']);
Route::post('application/{id}', ['as' => 'application.restore', 'uses' => 'ApplicationController@restore']);
Route::post('application/delete/{id}', ['as' => 'application.forcedelete', 'uses' => 'ApplicationController@forceDelete']);

Route::match(['get', 'post'],'application-export/word', ['as' => 'applicationExport.word', 'uses' => 'ApplicationController@wordExport']);
Route::match(['get', 'post'],'application-export/pdf', ['as' => 'applicationExport.pdf', 'uses' => 'ApplicationController@pdfExport']);


Route::post('application-status/changeStatus', ['as' => 'application.changeStatus', 'uses' => 'ApplicationController@changeStatusOfApplication']);

Route::get('application-formupdate/{id}', ['as' => 'application.formupdate', 'uses' => 'ApplicationController@formSelector']);
Route::put('application-applicant_details/submit', ['as' => 'application.applicant_details.submit', 'uses' => 'ApplicationController@submitApplicantDetails']);
Route::put('application-collateral_details/submit', ['as' => 'application.collateral_details.submit', 'uses' => 'ApplicationController@submitCollateralDetails']);
Route::put('application-loan_details/submit', ['as' => 'application.loan_details.submit', 'uses' => 'ApplicationController@submitLoanDetails']);
Route::put('application-guarantor_details/submit', ['as' => 'application.guarantor_details.submit', 'uses' => 'ApplicationController@submitGuarantorDetails']);
Route::put('application-sanchi_details/submit', ['as' => 'application.sanchi_details.submit', 'uses' => 'ApplicationController@submitSanchiDetails']);
Route::put('application-other_details/submit', ['as' => 'application.other_details.submit', 'uses' => 'ApplicationController@submitOtherDetails']);
Route::put('application-review/submit', ['as' => 'application.review.submit', 'uses' => 'ApplicationController@submitReview']);

Route::get('address/load-district-row', ['as' => 'address.load-district-row', 'uses' => 'ApplicationController@loadDistrictHtml']);
Route::get('address/load-local-gov-row', ['as' => 'address.load-local-gov-row', 'uses' => 'ApplicationController@loadLocalGovHtml']);

Route::get('templates', 'TemplateController@index')->name('templates.index');
Route::get('templates/create', 'TemplateController@create')->name('templates.create');
Route::post('templates/store', 'TemplateController@store')->name('templates.store');
Route::get('templates/download/', 'TemplateController@download')->name('templates.download');
Route::delete('templates/delete/{file_name?}', 'TemplateController@delete')->where('file_name', '(.*)')->name('templates.destroy');

Route::resource('taketa_patras', 'TaketaPatraController');
Route::post('taketa_patras/bulk-action', ['as' => 'taketa_patras.bulk-action', 'uses' => 'TaketaPatraController@bulkAction']);
Route::post('taketa_patras/{id}', ['as' => 'taketa_patras.restore', 'uses' => 'TaketaPatraController@restore']);
Route::post('taketa_patras/delete/{id}', ['as' => 'taketa_patras.forcedelete', 'uses' => 'TaketaPatraController@forceDelete']);

Route::match(['get', 'post'],'taketa_patras-export/word', ['as' => 'taketa_patrasExport.word', 'uses' => 'TaketaPatraController@wordExport']);
Route::match(['get', 'post'],'taketa_patras-export/pdf', ['as' => 'taketa_patrasExport.pdf', 'uses' => 'TaketaPatraController@pdfExport']);



Route::resource('sliders', 'SliderController',[
    'except' => ['destroy']]);
Route::post('slider/bulk-action', ['as' => 'sliders.bulk-action', 'uses' => 'SliderController@bulkAction']);
Route::post('slider/delete/{id}', ['as' => 'sliders.forcedelete', 'uses' => 'SliderController@forceDelete']);
Route::post('slider/update-rank',     ['as' => 'sliders.update-rank','uses' => 'SliderController@updateRank']);
Route::delete('slider/destroy',     ['as' => 'sliders.destroy','uses' => 'SliderController@destroySlider']);


Route::resource('credit_analysis', 'CreditAnalysisController');
Route::post('credit_analysis/bulk-action', ['as' => 'credit_analysis.bulk-action', 'uses' => 'CreditAnalysisController@bulkAction']);
Route::post('credit_analysis-restore/{id}', ['as' => 'credit_analysis.restore', 'uses' => 'CreditAnalysisController@restore']);
Route::post('credit_analysis/delete/{id}', ['as' => 'credit_analysis.forcedelete', 'uses' => 'CreditAnalysisController@forceDelete']);

Route::match(['get', 'post'],'credit_analysis-export/word', ['as' => 'credit_analysisExport.word', 'uses' => 'CreditAnalysisController@wordExport']);
Route::match(['get', 'post'],'credit_analysis-export/pdf', ['as' => 'credit_analysisExport.pdf', 'uses' => 'CreditAnalysisController@pdfExport']);


Route::resource('credit_renew', 'CreditRenewController');
Route::post('credit_renew/bulk-action', ['as' => 'credit_renew.bulk-action', 'uses' => 'CreditRenewController@bulkAction']);
Route::post('credit_renew-restore/{id}', ['as' => 'credit_renew.restore', 'uses' => 'CreditRenewController@restore']);
Route::post('credit_renew/delete/{id}', ['as' => 'credit_renew.forcedelete', 'uses' => 'CreditRenewController@forceDelete']);

Route::match(['get', 'post'],'credit_renew-export/word', ['as' => 'credit_renewExport.word', 'uses' => 'CreditRenewController@wordExport']);
Route::match(['get', 'post'],'credit_renew-export/pdf', ['as' => 'credit_renewExport.pdf', 'uses' => 'CreditRenewController@pdfExport']);


Route::resource('mortgage_appraisal', 'MortageAppraisalController');
Route::post('mortgage_appraisal/bulk-action', ['as' => 'mortgage_appraisal.bulk-action', 'uses' => 'MortageAppraisalController@bulkAction']);
Route::post('mortgage_appraisal-restore/{id}', ['as' => 'mortgage_appraisal.restore', 'uses' => 'MortageAppraisalController@restore']);
Route::post('mortgage_appraisal/delete/{id}', ['as' => 'mortgage_appraisal.forcedelete', 'uses' => 'MortageAppraisalController@forceDelete']);

Route::match(['get', 'post'],'mortgage_appraisal-export/word', ['as' => 'mortgage_appraisalExport.word', 'uses' => 'MortageAppraisalController@wordExport']);
Route::match(['get', 'post'],'mortgage_appraisal-export/pdf', ['as' => 'mortgage_appraisalExport.pdf', 'uses' => 'MortageAppraisalController@pdfExport']);



Route::post('address/load-suggestion-row', ['as' => 'address.load-suggestion-row', 'uses' => 'ApplicationController@loadSuggestionsHtml']);

Route::get('file/{application_id}/{filename}', 'ApplicationController@displayFile')->name('file.displayFile');

Route::post('file/delete-file', 'ApplicationController@submitFileDelete')->name('file.fileDelete');



Route::get('blacklist', 'BlacklistController@index')->name('blacklist.index');

Route::get('blacklist/list/all', 'BlacklistController@getBlacklist')->name('blacklist.list');
Route::get('blacklist/import/form', ['as'=>'blacklist.import' , 'uses'=> 'BlacklistController@getImportForm']);

Route::post('blacklist/importstore', ['as' => 'blacklist.importstore', 'uses' => 'BlacklistController@importStore']);

Route::get('report/advance_report', 'ReportController@advanceReport')->name('report.index');
Route::get('advance_report', ['as' => 'report.advance_report', 'uses' => 'ReportController@advanceReport']);
Route::get('advance_report_result', ['as' => 'report.advance_report_result', 'uses' => 'ReportController@advanceReportResult']);
Route::get('advance_report_result_export', ['as' => 'report.advance_report_result_export', 'uses' => 'ReportController@advanceReportResultExport']);


Route::post('fill/application-fill', ['as' => 'fill.application_fill', 'uses' => 'ApplicationController@applicantFill']);
Route::post('fill/lander-fill', ['as' => 'fill.lander_fill', 'uses' => 'ApplicationController@landerFill']);
Route::post('fill/guaranter-fill', ['as' => 'fill.guaranter_fill', 'uses' => 'ApplicationController@guarantorFill']);
Route::post('fill/laghu-fill', ['as' => 'fill.laghu_fill', 'uses' => 'ApplicationController@laghuFill']);

Route::get('backups', 'BackupController@index')->name('backups.index');
Route::post('backups/create', 'BackupController@create')->name('backups.store');
Route::get('backups/download/', 'BackupController@download')->name('backups.download');
Route::delete('backups/delete/{file_name?}', 'BackupController@delete')->where('file_name', '(.*)')->name('backups.destroy');

Route::resource('darta_chalani', 'DartaChalaniController');
Route::post('darta_chalani/load-gallery-row-html', ['as' => 'darta_chalani.load-gallery-row-html', 'uses' => 'DartaChalaniController@loadGalleryRowHtml']);
Route::post('darta_chalani/bulk-action', ['as' => 'darta_chalani.bulk-action', 'uses' => 'DartaChalaniController@bulkAction']);
Route::post('darta_chalani/{id}', ['as' => 'darta_chalani.restore', 'uses' => 'DartaChalaniController@restore']);
Route::post('darta_chalani/delete/{id}', ['as' => 'darta_chalani.forcedelete', 'uses' => 'DartaChalaniController@forceDelete']);
Route::get('darta_chalani/{record_id}/{filename}',['as'=>'file_link', 'uses'=> 'DartaChalaniController@getFile'])->where('filename', '^[^/]+$');
Route::get('darta_chalani/file/delete/{record_id}/{filename}', ['as' => 'darta_chalani.deleteFile', 'uses' => 'DartaChalaniController@deleteFile']);


Route::group(['prefix' => 'crm'], function () {
    Route::resource('lead', 'LeadController');
    Route::get('getApplicationDetailsById/{id?}', 'LeadController@getApplicationDetailsById');
    Route::post('lead/bulk-action', ['as' => 'lead.bulk-action', 'uses' => 'LeadController@bulkAction']);
    Route::get('lead/delete/{id}', ['as' => 'lead.delete', 'uses' => 'LeadController@destroy']);
    Route::get('lead/status/{id}', ['as' => 'lead.status', 'uses' => 'LeadController@updateStatus']);


    Route::resource('task-activity', 'TaskController');
    Route::post('task-activity/bulk-action', ['as' => 'task-activity.bulk-action', 'uses' => 'TaskController@bulkAction']);
    Route::get('task-activity/{id}/postpond', ['as' => 'task-activity.postpond', 'uses' => 'TaskController@postpond']);
    Route::PUT('task-activity/postpond/{id}', ['as' => 'task-activity.postpondAction', 'uses' => 'TaskController@postpondAction']);
    Route::get('task-activity/create/{id}', ['as' => 'task-activity.create.by.id', 'uses' => 'TaskController@createById']);

    Route::get('dashboard/', ['as' => 'crm.index', 'uses' => 'CrmController@index']);
    Route::get('report-generate/', ['as' => 'crm.report-generate', 'uses' => 'CrmController@reportGenerate']);

});