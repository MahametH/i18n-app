<?php
	
	namespace App\Models;
	
	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Database\Eloquent\Relations\BelongsTo;
	use Spatie\Translatable\HasTranslations;
	
	class Post extends Model
	{
		use HasFactory, HasTranslations;
		
		public $translatable = ['title', 'body'];
		
		protected $fillable = ['title', 'body'];
		
		/**
		 * A post belongs to a user
		 *
		 * @return BelongsTo
		 */
		public function user()
		{
			return $this->belongsTo(User::class);
		}
	}
