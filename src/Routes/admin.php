<?php


    // Property
    Route::get('/properties', [propertyController::class, 'index'])->name('admin_properties_index')->middleware('auth.admin.access');
    Route::post('/properties/submit', [propertyController::class, 'submit'])->name('admin_properties_submit')->middleware('auth.admin.access');
    Route::post('/properties/edit', [propertyController::class, 'edit'])->name('admin_properties_edit')->middleware('auth.admin.access');