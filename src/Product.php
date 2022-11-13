<?php

namespace CT275\Project;

class Product
{
	private $db;
	private $id = -1;
	public $name;
	public $price;
	public $description;
	public $category_id;
	public $image;
	public $created_day;
	public $updated_day;
	private $errors = [];

	public function getId()
	{
		return $this->id;
	}

	public function __construct($pdo)
	{
		$this->db = $pdo;
	}

//Them du lieu vao csdl tu input cua nguoi dung nhap vao
	public function fill(array $data, $file)
	{
		if (isset($data['name'])) {
			$this->name = trim($data['name']);
		}

		if (isset($data['price'])) {
			$this->price = preg_replace('/\D+/', '', $data['price']);
		}

		if (isset($data['description'])) {
			$this->description = trim($data['description']);
		}

		if (isset($data['category_id'])) {
			$this->category_id = trim($data['category_id']);
		}

		if (isset($file)) {
			$this->image = ($file);
		}

		return $this;
	}
	//Xuat loi
	public function getValidationErrors()
	{
		return $this->errors;
	}

	//Kiem tra loi
	public function validate()
	{
		if (!$this->name) {
			$this->errors['name'] = 'Tên sản phẩm không hợp lệ.';
		}

		if (!$this->price) {
			$this->errors['price'] = 'Giá sản phẩm không hợp lệ.';
		}

		if (strlen($this->description) > 255) {
			$this->errors['description'] = 'Mô tả ít nhất phải 255 ký tự.';
		}

		if (!$this->category_id) {
			$this->errors['category_id'] = 'Danh mục sản phẩm không hợp lệ.';
		}

		if (!$this->image) {
			$this->errors['image'] = 'Ảnh sản phẩm không hợp lệ.';
		}

		return empty($this->errors);
	}
	//Lay du lieu tu csdl table product
	protected function fillFromDB(array $row)
	{
		[
		'id' => $this->id,
		'name' => $this->name,
		'price' => $this->price,
		'description' => $this->description,
		'category_id' => $this->category_id,
		'image' => $this->image,
		'created_day' => $this->created_day,
		'updated_day' => $this->updated_day
		] = $row;
		return $this;
	}
	//Hien thi tat ca san pham
	public function all()
	{
		$products = [];
		$stmt = $this->db->prepare('select * from product');
		$stmt->execute();
		while ($row = $stmt->fetch()) {
			$product = new Product($this->db);
			$product->fillFromDB($row);
			$products[] = $product;
		} return $products;
	} 

	//Hien thi 3 san pham moi
	public function getProNew()
	{
		$products = [];
		$stmt = $this->db->prepare('select * from product order by created_day desc limit 3');
		$stmt->execute();
		while ($row = $stmt->fetch()) {
			$product = new Product($this->db);
			$product->fillFromDB($row);
			$products[] = $product;
		} return $products;
	}

	//Cap nhat hoac insert vao table
	public function save()
	{
		$result = false;
		if ($this->id >= 0) {
			$stmt = $this->db->prepare('update product set name = :name,
			price = :price, description = :description, category_id = :category_id, image = :image, updated_day = now()
			where id = :id');
			$result = $stmt->execute([
			'name' => $this->name,
			'price' => $this->price,
			'description' => $this->description,
			'category_id' => $this->category_id,
			'image' => $this->image,
			'id' => $this->id]);
			$imgname = $this->image;
			move_uploaded_file($_FILES['image']['tmp_name'], 'C:/xampp/apps/project/public/img/upload/'.$imgname);
		} else {
			$stmt = $this->db->prepare(
			'insert into product (name, price, description, category_id, image, created_day, updated_day)
			values (:name, :price, :description, :category_id, :image, now(), now())');
			$result = $stmt->execute([
			'name' => $this->name,
			'price' => $this->price,
			'description' => $this->description,
			'category_id' => $this->category_id,
			'image' => $this->image]);
			if ($result) {
				$this->id = $this->db->lastInsertId();
			}
			$imgname = $this->image;
			move_uploaded_file($_FILES['image']['tmp_name'], 'C:/xampp/apps/project/public/img/upload/'.$imgname);
		} return $result;
	}

	//Tim san pham tren id
	public function find($id)
	{
		$stmt = $this->db->prepare('select * from product where id = :id');
		$stmt->execute(['id' => $id]);
		if ($row = $stmt->fetch()) {
			$this->fillFromDB($row);
			return $this;
		} else return null;
	} 

	//Cap nhat san pham
	public function update(array $data, $file)
	{
		$upload_file = basename($_FILES['image']['name']);
		//basename : tra ve ten tep tu mot duong dan
		$this->fill($data,$upload_file);
		if ($this->validate()) {
			return $this->save();
		} return false; 
	}
	public function checkcart(){
		$stmt = $this->db->prepare('select * from detail_cart');
		$stmt->execute();
		foreach ($stmt as $product) {
			if ($product['product_id'] == $this->id) {
				return true;
			} else return false;
		}

	}

	//Xoa san pham trong gio hang
	public function delete(){
		$product = new Product($this->db);
		if ($product->checkcart() == false) {
			$stmt = $this->db->prepare('delete from product where id = :id');
			return $stmt->execute(['id' => $this->id]);
		} else return null;
		
	}


	//Tim kiem san pham dua tren Ten san pham va Ten danh muc san pham
	public function search($key)
	{
		$products = [];
		$stmt = $this->db->prepare("select * from product s inner join category c on s.category_id = c.category_id where name LIKE '%" . $key . "%' or category_name LIKE '%". $key ."%'  ");
		$stmt->execute();
		while ($row = $stmt->fetch()) {
			$product = new Product($this->db);
			$product->fillFromDB($row);
			$products[] = $product;
		} return $products;
	}
	public function countProduct(){
		$stmt = $this->db->prepare("select count(*) as countPro from product");
		$stmt->execute();
		$row = $stmt->fetch();
		return $row["countPro"];
	}


}