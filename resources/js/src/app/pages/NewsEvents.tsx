import { Calendar, MapPin, Users } from 'lucide-react';
import { Card, CardContent, CardHeader, CardTitle } from '../components/ui/card';
import { Badge } from '../components/ui/badge';
import { Button } from '../components/ui/button';
import { useEffect, useRef, useState } from 'react';

export function NewsEvents() {
  const [heroVisible, setHeroVisible] = useState(false);
  const heroRef = useRef<HTMLElement>(null);

  useEffect(() => {
    setHeroVisible(true);
  }, []);

  const events = [
    {
      title: 'Annual General Assembly 2026',
      date: 'March 15, 2026',
      location: 'Main Office Auditorium',
      description: 'Join us for our annual general assembly where we review the past year and plan for the future.',
      category: 'Assembly',
      image: 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=800'
    },
    {
      title: 'Financial Literacy Seminar',
      date: 'March 22, 2026',
      location: 'Online Webinar',
      description: 'Learn essential financial planning skills from industry experts. Free for all members.',
      category: 'Education',
      image: 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=800'
    },
    {
      title: 'Community Outreach Program',
      date: 'April 5, 2026',
      location: 'Community Center',
      description: 'Join our cooperative in giving back to the community through various outreach activities.',
      category: 'Community',
      image: 'https://images.unsplash.com/photo-1559027615-cd4628902d4a?w=800'
    },
  ];

  const news = [
    {
      title: 'New Branch Opening Soon',
      date: 'February 10, 2026',
      excerpt: 'We are excited to announce the opening of our East Branch in April 2026...',
    },
    {
      title: 'Updated Interest Rates',
      date: 'February 1, 2026',
      excerpt: 'Check out our new competitive rates on savings accounts and time deposits...',
    },
    {
      title: 'Award Recognition',
      date: 'January 25, 2026',
      excerpt: 'Community Cooperative receives Best Cooperative Award for outstanding service...',
    },
  ];

  return (
    <div className="flex flex-col">
      <section ref={heroRef} className="relative bg-gradient-to-br from-primary via-primary to-secondary text-white py-16 sm:py-24 overflow-hidden">
        <div
          className="absolute inset-0 bg-[url('/src/images/bghd.jpg')] bg-cover bg-center"
          style={{ transition: 'transform 20s linear', transform: heroVisible ? 'scale(1)' : 'scale(1.05)' }}
        />
        <div className="absolute inset-0 bg-primary/60" />
        <div className="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <Badge className="mb-4 bg-white/20 text-white border-white/30">Stay Updated</Badge>
          <h1 className="text-4xl sm:text-5xl font-bold mb-4">News & Events</h1>
          <p className="text-lg text-blue-100">
            Stay informed about the latest happenings in our cooperative community
          </p>
        </div>
      </section>

      <section className="py-16">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <h2 className="text-3xl font-bold mb-8">Upcoming Events</h2>
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            {events.map((event, index) => (
              <Card key={index} className="rounded-2xl border-border/50 overflow-hidden hover:shadow-lg transition-all">
                <div className="aspect-video overflow-hidden bg-muted">
                  <img src={event.image} alt={event.title} className="w-full h-full object-cover" />
                </div>
                <CardHeader>
                  <Badge className="w-fit mb-2">{event.category}</Badge>
                  <CardTitle>{event.title}</CardTitle>
                </CardHeader>
                <CardContent className="space-y-3">
                  <div className="flex items-center gap-2 text-sm text-muted-foreground">
                    <Calendar className="w-4 h-4" />
                    {event.date}
                  </div>
                  <div className="flex items-center gap-2 text-sm text-muted-foreground">
                    <MapPin className="w-4 h-4" />
                    {event.location}
                  </div>
                  <p className="text-sm text-muted-foreground">{event.description}</p>
                  <Button className="w-full rounded-lg" variant="outline">Learn More</Button>
                </CardContent>
              </Card>
            ))}
          </div>
        </div>
      </section>

      <section className="py-16 bg-muted/30">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <h2 className="text-3xl font-bold mb-8">Latest News</h2>
          <div className="space-y-4 max-w-4xl mx-auto">
            {news.map((item, index) => (
              <Card key={index} className="rounded-2xl border-border/50 hover:shadow-lg transition-all">
                <CardContent className="p-6">
                  <div className="flex items-start justify-between gap-4">
                    <div className="flex-1">
                      <h3 className="font-semibold mb-2">{item.title}</h3>
                      <p className="text-sm text-muted-foreground mb-2">{item.excerpt}</p>
                      <p className="text-xs text-muted-foreground">{item.date}</p>
                    </div>
                    <Button variant="ghost" size="sm">Read More</Button>
                  </div>
                </CardContent>
              </Card>
            ))}
          </div>
        </div>
      </section>
    </div>
  );
}