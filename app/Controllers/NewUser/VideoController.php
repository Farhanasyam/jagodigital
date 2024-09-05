<?php

namespace App\Controllers\NewUser;

use App\Controllers\NewUser\BaseController;
use App\Models\KategoriVideoModels;
use App\Models\VideoPembelajaranModels;

class VideoController extends BaseController
{
    protected $kategoriVideoModels;
    protected $videoPembelajaranModels;

    public function __construct()
    {
        parent::__construct();

        $this->kategoriVideoModels = new KategoriVideoModels();
        $this->videoPembelajaranModels = new VideoPembelajaranModels();
    }

    public function index()
    {
        $kategoriVideoModels = $this->kategoriVideoModels->findAll();
        $videoPembelajaranModels = $this->videoPembelajaranModels->findAll();

        return $this->render('NewUser/materi-pembelajaran/index', [
            'title' => 'Video',
            'kategoriVideoModels' => $kategoriVideoModels,
            'videoPembelajaranModels' => $videoPembelajaranModels,
        ]);
    }

    public function categoryDetails($id_katvideo)
    {
        $data['selectedCategory'] = $this->kategoriVideoModels->find($id_katvideo);
        $data['videos'] = $this->videoPembelajaranModels->where('id_katvideo', $id_katvideo)->findAll();

        return $this->render('NewUser/materi-pembelajaran/index_category', $data);
    }

    public function detail($id)
    {
        // Fetch the video by ID
        $video = $this->videoPembelajaranModels->getVideoWithCategory($id);

        // Fetch related videos in the same category, excluding the current video
        $related_videos = $this->videoPembelajaranModels->getRelatedVideos($id, $video->id_katvideo);

        // Limit the related videos to 4 and shuffle them
        $related_videos = array_slice($related_videos, 0, 4); // Limit to 4 videos
        shuffle($related_videos); // Shuffle to ensure randomness

        // Pass data to the view
        return $this->render('NewUser/materi-pembelajaran/detail', [
            'video' => $video,
            'related_videos' => $related_videos
        ]);
    }
}
