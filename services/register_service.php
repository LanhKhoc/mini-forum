<?php session_start();

class register_service {
  private $rules = [
    'username' => 'required|min:6|alpha_num',
    'password' => 'required|min:6|alpha_num',
    'gender' => 'required|in:Nam,Nữ',
    'fullname' => 'required|regex:/[^a-zA-Z ]+/',
    'email' => 'required|email|min:10'
  ];

  private function validateReg($data) {
    $validator = new vendor_validator_util();
    $result = $validator->validate($this->rules, $data);
    if ($result['status'] == false) {
      foreach ($result['message'] as $key => $value) { $_SESSION['register_error'][$key] = $value; }
      return false;
    }

    // NOTE: Check exists user
    $model = new user_model();
    $countExistsUser = $model->get('id', [
      'conditions' => ['username' => $data['username']]
    ])->num_rows;

    if ($countExistsUser > 0) {
      $_SESSION['register_error']['username'] = 'Username exists!';
      return false;
    }

    // NOTE: Should confirm before
    if ($data['confirm'] == false) {
      $_SESSION['register_error']['confirm'] = 'Need confirm before register';
      return false;
    }

    return true;
  }

  public function store($data) {
    $validate = $this->validateReg($data);
    if ($validate == true) {
      $model = new user_model();
      $model->store([
        'username' => $data['username'],
        'email' => $data['email'],
        'fullname' => $data['fullname'],
        'password' => md5($data['password']),
        'gender' => $data['gender'],
        'permission_id' => 3
      ]);

      // NOTE: Save user session then login
      $userInfo = $model->get('*', [
        'conditions' => [
          'username' => $data['username']
        ]
      ])->fetch_assoc();

      $_SESSION['user_info'] = [
        'id' => $userInfo['id'],
        'fullname' => $userInfo['fullname'],
        'avatar' => $userInfo['avatar']
      ];

      return true;
    }

    foreach ($data as $key => $value) { $_SESSION['register_remember'][$key] = $value; }
    return false;
  }
}