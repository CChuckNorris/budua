<?php


namespace backend\modules\blog\modules\dashboard\managers;

use backend\modules\blog\modules\dashboard\models\Post;
use yii\web\UploadedFile;

/**
 * Class PostManager
 * @package backend\modules\blog\modules\dashboard\models
 */
class PostManager
{
    /** @var Post **/
    protected $repository;

    private $data;

    /** @var FileUploaderManager **/
    private $FileUploadManager;

    /**
     * PostManager constructor.
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->repository = $post;
        $this->FileUploadManager = new FileUploaderManager();
    }

    public function getAll()
    {
        return $this->repository->find()->asArray()->all();
    }

    public function getPublished()
    {
        return $this->repository->find()
            ->joinWith(["tags", "category"])
            ->where(["status" => Post::PUBLISHED_STATUS])
            ->orderBy('created_at DESC')
            ->asArray()
            ->all();
    }

    public function getByCategorySlug($category_slug)
    {
        return $this->repository->find()
            ->joinWith(["tags", "category"])
            ->where(["status" => Post::PUBLISHED_STATUS])
            ->andWhere(["blog_category.slug" => $category_slug])
            ->asArray()
            ->all();
    }

    public function getAnnounced()
    {
        return $this->repository->find()
            ->joinWith(["tags", "category"])
            ->where(["status" => Post::PUBLISHED_STATUS])
            ->andWhere(["is_announcement" => 1])
            ->limit(4)
            ->asArray()
            ->all();
    }

    public function getByTagSlug($tag_slug)
    {
        return $this->repository->find()
            ->joinWith(["tags", "category"])
            ->where(["status" => Post::PUBLISHED_STATUS])
            ->andWhere(["blog_tags.slug" => $tag_slug])
            ->asArray()
            ->all();
    }

    public function getEntity()
    {
        return $this->repository;
    }

    public function getEntityID()
    {
        return $this->repository->id;
    }

    public function findEntityByID($id)
    {
        $this->repository = $this->repository->find()->where(["id" => $id])->one();
        return $this->repository;
    }

    public function findEntityBySlug($slug)
    {
        $this->repository = $this->repository->find()->where(["slug" => $slug])
            ->andWhere(["status" => Post::PUBLISHED_STATUS])->one();
        return $this->repository;
    }

    public function load($requestData)
    {
        if ($this->repository->load($requestData))
            return true;

        return false;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function save()
    {
        if ($this->load($this->data)) {

            $this->saveMedia();
            $this->saveTags();

            $this->repository->published_at = date("Y-m-d h:i:s", time());

            if ($this->repository->save()) {
                return true;
            }
        }
        return false;
    }

    public function initTags()
    {
        $this->repository->tags_ids = $this->repository->tags;
    }

    private function saveTags()
    {
        if ($this->repository->tags_ids)
        {
            $this->repository->setRelated('tags', $this->repository->tags_ids, true);
        }
    }

    private function saveMedia()
    {
        if ($preview_xl = UploadedFile::getInstances($this->repository, 'file'))
        {
            $links = $this->FileUploadManager
                ->setFileNamePattern("preview")
                ->setSizes(["small" => [320, 240], "medium" => [640, 480], "large" => [800, 600], "x-large" => [960, 720]])
                ->setTargetDirectory("blog")
                ->bulkUpload($preview_xl);

            $previews = $links[0]["previews"];

            $this->repository->preview_xl = $previews["x-large"];
            $this->repository->preview_l = $previews["large"];
            $this->repository->preview_m = $previews["medium"];
            $this->repository->preview_s = $previews["small"];
        }
    }

    public function delete()
    {
        $this->repository->delete();
    }
}