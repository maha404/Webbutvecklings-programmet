using System.ComponentModel.DataAnnotations;
using book_collection.Model;

namespace book_collection.Model
{
    public class Category
    {
        public int Id { get; set; }
        [Display(Name="Kategori")]
        public string? CategoryName { get; set; }
        
        public List<Book>? Books { get; set; }
    }
}

