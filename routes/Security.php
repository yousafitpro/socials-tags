<?php



Route::middleware('auth')
    ->prefix('security')
    ->group(function () {
     Route::get('2FA',[\App\Http\Controllers\TwoStepVerificationController::class,'index']);
     Route::get('email/2FA',[\App\Http\Controllers\TwoStepVerificationController::class,'email_2FA'])->name('security.2FA');
     Route::get('accept-agreement',[\App\Http\Controllers\SubscriptionController::class,'accept_agreement'])->name('security.acceptAgreement');
     Route::get('accept_agreement_now',[\App\Http\Controllers\SubscriptionController::class,'accept_agreement_now'])->name('security.acceptAgreementNow');
     Route::get('renew-package',[\App\Http\Controllers\SubscriptionController::class,'renew_package'])->name('security.renewPackage');
     Route::get('packages',[\App\Http\Controllers\SubscriptionController::class,'packages'])->name('security.packages');
     Route::get('page',[\App\Http\Controllers\SecurityController::class,'page'])->name('security.page');
     Route::get('disable-2FA',[\App\Http\Controllers\SecurityController::class,'disable_2fa'])->name('security.disable2fa');
     Route::post('verify-phone-number',[\App\Http\Controllers\SecurityController::class,'verify_phone_number'])->name('security.verifyPhoneNumber');
     Route::post('Verify2FACode',[\App\Http\Controllers\TwoStepVerificationController::class,'Verify2FACode'])->name('security.Verify2FACode');
     Route::post('VerifyEmail2FACode',[\App\Http\Controllers\TwoStepVerificationController::class,'VerifyEmail2FACode'])->name('security.VerifyEmail2FACode');
     Route::post('verify-phone-number-step-2',[\App\Http\Controllers\SecurityController::class,'verify_phone_number_step_2'])->name('security.verifyPhoneNumberStep_2');
    });
