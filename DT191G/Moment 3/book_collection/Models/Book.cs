using System.ComponentModel.DataAnnotations;
using book_collection.Model;

namespace book_collection.Model
{
    public class Book 
    {
        public int Id { get; set; }

        [Display(Name="Titel")]
        public string? Title { get; set; }
        [Display(Name="Beskrivning")]
        public string? Description { get; set; }
        [Display(Name="Författare")]
        public string? Author { get; set; }

        [Display(Name="Kategori")]
        public int? CategoryId { get; set; }
        [Display(Name="Kategori")]
        public Category? Category { get; set; }

        public Borrow? Borrow { get; set; }
    }
}