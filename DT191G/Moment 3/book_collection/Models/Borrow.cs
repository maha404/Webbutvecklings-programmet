using System.ComponentModel.DataAnnotations;
using book_collection.Model;

namespace book_collection.Model
{
    public class Borrow 
    {
        public int Id { get; set; }
        [Display(Name="Namn")]
        public string? Name { get; set; }
        [Display(Name="Utlånad")]
        public DateTime BorrowedDate{ get; set; } = DateTime.Now;

        [Display(Name="Bok")]
        public int? BookId { get; set; }
        [Display(Name="Bok")]
        public Book? Book { get; set; }
        
    }
}