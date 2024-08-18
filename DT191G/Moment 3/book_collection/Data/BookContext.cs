using Microsoft.EntityFrameworkCore;
using book_collection.Model;

namespace book_collection.Data 
{
    public class BookContext : DbContext
    {
        public BookContext(DbContextOptions<BookContext> options) : base(options) 
        {

        }

        // Tabeller i databasen
        public DbSet<Category> Categories { get; set; }
        public DbSet<Book> Books { get; set; }
        public DbSet<Borrow> Borrowed { get; set; }
        
    }
}

