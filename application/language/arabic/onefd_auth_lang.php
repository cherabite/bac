<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Name:  Ion Auth Lang - Arabic
 *
 * Author: Emad Elsaid
 *           blazeeboy@gmail.com
 *
 * Location: http://github.com/benedmunds/ion_auth/
 *
 * Created:  30.08.2010
 *
 * Description:  Arabic language file for Ion Auth messages and errors
 *
 */

// Account Creation
$lang['account_creation_successful'] = 'تــم إنـشــاء المـسـتـخــدم بـنــجــــاح';
$lang['account_creation_unsuccessful'] = 'حدث خطأ اثناء انشاء حسابك لدينا';
$lang['account_creation_duplicate_email'] = 'هذا البريد الإلكترونى تم استخدامه من قبل او غير صحيح';
$lang['account_creation_duplicate_identity'] = 'اسم المستخدم تم التسجيل به من قبل او غير صحيح';
$lang['account_creation_missing_default_group'] = 'Default group is not set';
$lang['account_creation_invalid_default_group'] = 'Invalid default group name set';

// Password
$lang['password_change_successful'] = 'تم تغيير كلمة السر';
$lang['password_change_unsuccessful'] = 'لا يمكن تغيير كلمة السر';
$lang['forgot_password_successful'] = 'تم ارسال بريد لإستعادة كلمة السر';
$lang['forgot_password_unsuccessful'] = 'لا يمكن استعادة كلمة السر';

// Activation
$lang['save_successful'] = 'تم حفظ التغييرات بنجــاح ';
$lang['activate_successful'] = 'تم تفعيل كل المستخدمين';
$lang['activate_unsuccessful'] = 'لا يمكن تفعيل حسابك';
$lang['deactivate_successful'] = ' تم إيقاف حسابك , إتصل بالمسؤول ';
$lang['deactivate_unsuccessful'] = 'لا يمكن إيقاف حسابك';
$lang['activation_email_successful'] = 'تم إرسال بريد التفعيل';
$lang['activation_email_unsuccessful'] = 'لا يمكن ارسال بريد التفعيل';
$lang['deactivate_current_user_unsuccessful'] = 'You cannot De-Activate your self.';

// Login / Logout
$lang['login_successful'] = 'تم تسجيل الدخول بنجاح';
$lang['login_unsuccessful'] = 'معلومات الدخول غير صحيحة';
$lang['login_unsuccessful_not_active'] = ' لقد تم إيقاف حسابك , مِؤقتا';
$lang['login_timeout'] = 'Temporarily Locked Out.  Try again later.';
$lang['logout_successful'] = 'تم تسجيل خروجك';

// Account Changes
$lang['update_successful'] = 'تم تعديل معلومات المستخدم بنجاح';
$lang['update_unsuccessful'] = 'لا يمكن تعديل معلومات الحساب';
$lang['delete_successful'] = 'تم إلغاء المستخدم';
$lang['delete_unsuccessful'] = 'لا يمكن إلغاء المستخدم';

// Groups
$lang['not_perm_admin'] = 'ليس لديك صلاحية الأدمن';
$lang['group_already_exists'] = 'Group name already taken';
$lang['group_update_successful'] = 'Group details updated';
$lang['group_delete_successful'] = 'Group deleted';
$lang['group_delete_unsuccessful'] = 'Unable to delete group';
$lang['group_delete_notallowed'] = 'Can\'t delete the administrators\' group';
$lang['group_name_required'] = 'Group name is a required field';
$lang['group_name_admin_not_alter'] = 'Admin group name can not be changed';

// Capatcha
$lang['auth_captcha_expired'] = 'إنتهت المدة المحددة لظهور الصورة';
$lang['auth_incorrect_captcha'] = 'تحقق من المعلومات الموجودة في الصورة';
$lang['incorrect_captcha'] = 'تحقق من المعلومات الموجودة في الصورة';
//form create user
$lang['nom'] = 'اللقب';
$lang['prenom'] = 'الإسم';
$lang['username'] = 'إسم المستخدم';
$lang['password'] = 'كلمة المرور';
$lang['jour'] = 'يوم الميلاد';
$lang['mois'] = 'شهر الميلاد';
$lang['annee'] = 'عام الميلاد';

$lang['enpr'] = 'رقم الإستمارة';
$lang['icode'] = 'رمز المستوى';
$lang['nom'] = 'اللقب بالأحرف العربية';
$lang['prenom'] = 'الإسم بالأحرف العربية';
$lang['nomlat'] = 'اللقب بالأحرف اللاتينية';
$lang['prenomlat'] = 'الإسم بالأحرف اللاتينية';
$lang['sexe'] = 'الجنس';

$lang['wilaya'] = ' الولاية';
$lang['daira'] = ' الدائرة';
$lang['commune'] = 'البلدية';
$lang['categorie'] = ' نوع الطالب';
$lang['niveau'] = ' المستوى';
$lang['fraisins'] = ' مصاريف التسجيل';
$lang['cours'] = '   نوع الدروس';
$lang['numact'] = ' رقم شهادة الميلاد';
// validation
$lang['not_perm_validation'] = 'ليس لديك الصلاحية للتأكيد';
$lang['not_fond_enpr'] = 'رقم الإستمارة هذا غــير مــوجــود';
$lang['fail_validation'] = 'حدث فشل في تـأكيد هذا المــتعلــــم';
$lang['not_permition_valid_by_niv'] = 'ليس لديك الصلاحية للتأكيد في هذا المــسـتــوى';
$lang['not_paye'] = 'هــذا الــطــالب لــم يـدفـع حـقـــوق الـتـسـجـــيـل';
$lang['null_enpr'] = 'أدخـــل رقــم الإسـتـمـــارة مــن فـظــلك';
$lang['lenght_enpr'] = 'رقم الإستمارة لا يجب أن يـكــون أكــثــر مــن 5 أرقـــام .';
$lang['valid_Nouv_Eleve'] = 'تـسـجـــيـل مــؤكــد لــمـتــعــلم جـــديــــد';
$lang['valid_Ancien_Eleve'] = 'تـسـجـــيـل مــؤكــد لــمـتــعــلم  ســــابق';

//diver
$lang['error_data_base'] = 'حدث فشل في استرجاع معلومات الطالب من قاعدة البيانات';
$lang['invalid_input class="permission"'] = 'أعد إدخال البايانات من فظلك';
$lang['no same'] = 'تأكد من تطابق البيانات في كلا من prein  et sco';
