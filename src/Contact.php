<?php 
namespace CT275\Project;
class Contact {

	private $db;
	private $id = -1;
	public $fullname;
	public $sdt;
	public $email;
	public $description;
	private $errors = [];

	public function __construct($pdo)
	{
		$this->db = $pdo;
	}

	public function getId()
	{
		return $this->id;
	}

	public function fill(array $data)
	{
		if (isset($data['fullname'])) {
			$this->fullname = trim($data['fullname']);
		}
		if (isset($data['sdt'])) {
			$this->sdt = trim($data['sdt']);
		}
		if (isset($data['email'])) {
			$this->email = trim($data['email']);
		}
		if (isset($data['description'])) {
			$this->description = trim($data['description']);
		}

		return $this;
	}

	public function getValidationErrors()
	{
		return $this->errors;
	}

	public function validate()
	{
		if (!$this->fullname) {
			$this->errors['fullname'] = 'Tên người dùng không hợp lệ. Vui lòng nhập lại!';
		}

		if (!$this->sdt) {
			$this->errors['sdt'] = 'Số điện thoại không hợp lệ. Vui lòng nhập lại!';
		} elseif (strlen($this->sdt) < 10) {
			$this->errors['sdt'] = 'Số điện thoại không hợp lệ. Vui lòng nhập lại!';
		}

		if (!$this->email) {
			$this->errors['email'] = 'Email không hợp lệ. Vui lòng nhập lại!';
		}

		if (!$this->description) {
			$this->errors['description'] = 'Nội dung không hợp lệ. Vui lòng nhập lại!';
		}

		return empty($this->errors);
	}

	//Lay tat ca du lieu tu bang user
	public function all()
	{
		$contacts = [];
		$stmt = $this->db->prepare('select * from contact');
		$stmt->execute();
		while ($row = $stmt->fetch()) {
			$contact = new Contact($this->db);
			$contact->fillFromDB($row);
			$contacts[] = $contact;
		} return $contacts;
	}

//Lay du lieu tu csdl
	protected function fillFromDB(array $row)
	{
		[
		'id' => $this->id,
		'fullname' => $this->fullname,
		'sdt' => $this->sdt,
		'email' => $this->email,
		'description' => $this->description
		] = $row;
		return $this;
	} 
//Tim nguoi liên he
	public function find($id)
	{
		$stmt = $this->db->prepare('select * from contact where id = :id');
		$stmt->execute(['id' => $id]);
		if ($row = $stmt->fetch()) {
			$this->fillFromDB($row);
			return $this;
		} return null;
	}
//Cap nhat hoac them du lieu (Neu id ton tai thi cap nhat nguoi dung dua tren id,
// Neu id khong ton tai <= 0 thi them du lieu moi)
	public function save()
	{
		$result = false;
		if ($this->id > 0) {
			$stmt = $this->db->prepare('update contact set fullname = :fullname,
			sdt = :sdt, email = :email, description = :description
			where id = :id');
			$result = $stmt->execute([
			'fullname' => $this->fullname,
			'sdt' => $this->sdt,
			'email' => $this->email,
			'description' => $this->description,
			'id' => $this->id]);
		} else {
			$stmt = $this->db->prepare(
			'insert into contact (fullname, sdt, email, description)
			values (:fullname, :sdt, :email, :description)');
			$result = $stmt->execute([
			'fullname' => $this->fullname,
			'sdt' => $this->sdt,
			'email' => $this->email,
			'description' => $this->description]);
			if ($result) {
				$this->id = $this->db->lastInsertId();
			}
		} return $result;
	}

	//Cap nhat hoac them du lieu du lieu
	public function update(array $data)
	{
		$this->fill($data);
		if ($this->validate()) {
			return $this->save();
		}
		return false;
	}

	public function delete()
	{
		$stmt = $this->db->prepare('delete from contact where id = :id');
		return $stmt->execute(['id' => $this->id]);
	}
	public function countContact(){
		$stmt = $this->db->prepare("select count(*) as countContact from contact");
		$stmt->execute();
		$row = $stmt->fetch();
		return $row["countContact"];
	}
}
?>