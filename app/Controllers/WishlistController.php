<?php

namespace App\Controllers;

use App\Models\CommonModel;
use CodeIgniter\API\ResponseTrait;

class WishlistController extends BaseController
{
    use ResponseTrait;

    private $model;
    private $table = 'wishlist';

    public function __construct()
    {
        $this->model = new CommonModel();
    }

    public function addToWishlist()
    {
        if ($this->request->getMethod() !== 'POST') {
            return $this->respond(['status' => 405, 'message' => 'Only POST requests are allowed.']);
        }

        $data = [
            'user_id' => $this->request->getPost('user_id'),
            'course_id' => $this->request->getPost('course_id')
        ];

        // Check if the item already exists in the wishlist
        $existingItem = $this->model->rowRecord($this->table, [
            'user_id' => $data['user_id'],
            'course_id' => $data['course_id']
        ]);

        if ($existingItem) {
            return $this->respond(['status' => 200, 'message' => 'Item already in wishlist.']);
        } else {
            $this->model->insertRecord($this->table, $data);
            return $this->respond(['status' => 201, 'message' => 'Item added to wishlist successfully.']);
        }
    }


    /**
     * Fetches the wishlist items for the given user ID.
     *
     * @param int $userId The ID of the user whose wishlist items need to be fetched.
     *
     * @return array A JSON response containing the wishlist items.
     *               The response will have a status code of 200 and contain the wishlist items if the wishlist is not empty.
     *               If the wishlist is empty, the response will have a status code of 204 and contain a message.
     */
    public function viewWishlist($userId)
    {

        $locationController = new \App\Controllers\LocationController();

        // Fetch location data to get the currency
        $locationData = $locationController->Location(); // Fetch method returns data
        $currency = $locationData['locationData']['allData']['currency'] ?? 'INR'; // Default to INR if currency is not set

        $wishlistItems = $this->model->getWishlistDetails($userId,$currency);

        if (!empty($wishlistItems)) {
            return $this->respond(['status' => 200, 'data' => $wishlistItems]);
        }

        return $this->respond(['status' => 204, 'message' => 'Wishlist is empty.']);
    }

    // public function removeFromWishlist($itemId)
    // {
    //     if ($this->model->deleteRecord($this->table, $itemId)) {
    //         return $this->respond(['status' => 200, 'message' => 'Item removed from wishlist successfully.']);
    //     }

    //     return $this->respond(['status' => 404, 'message' => 'Item not found.']);
    // }

    /**
     * Clears the wishlist for the given user ID.
     *
     * @param int $userId The ID of the user whose wishlist needs to be cleared.
     *
     * @return array A JSON response containing the status of the operation.
     *               The response will have a status code of 200 and contain a success message if the wishlist is cleared successfully.
     *               If the wishlist is empty, the response will have a status code of 404 and contain an error message.
     */
    public function clearWishlist($userId)
    {
       
        if ($this->model->deleteRecord($this->table, ['user_id' => $userId])) {
            return $this->respond(['status' => 200, 'message' => 'Wishlist cleared successfully.']);
        }

        return $this->respond(['status' => 404, 'message' => 'Item not found.']);
    }

    /**
     * Removes a course from the wishlist for the given user ID and course ID.
     *
     * @param int $userId The ID of the user whose wishlist needs to be updated.
     * @param int $courseId The ID of the course to be removed from the wishlist.
     *
     * @return array A JSON response containing the status of the operation.
     *               The response will have a status code of 200 and contain a success message if the course is removed successfully.
     *               If the course is not found in the wishlist, the response will have a status code of 404 and contain an error message.
     */
    public function removeFromCWishlist($userId,$courseId)
    {
        if ($this->model->deleteRecord($this->table, ['user_id' => $userId, 'course_id' => $courseId])) {
            return $this->respond(['status' => 200, 'message' => 'Item removed from wishlist successfully.']);
        }

        return $this->respond(['status' => 404, 'message' => 'Item not found.']);
    }
}
