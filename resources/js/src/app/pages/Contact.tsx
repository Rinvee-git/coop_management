import { useState, useEffect } from 'react';
import { useForm } from 'react-hook-form';
import { toast } from 'sonner';
import { Phone, Mail, MapPin, Clock, Facebook, Twitter, Instagram, Linkedin, Send } from 'lucide-react';
import { Card, CardContent, CardHeader, CardTitle } from '../components/ui/card';
import { Button } from '../components/ui/button';
import { Input } from '../components/ui/input';
import { Label } from '../components/ui/label';
import { Textarea } from '../components/ui/textarea';
import { Badge } from '../components/ui/badge';

type ContactFormData = {
  name: string;
  email: string;
  subject: string;
  message: string;
};

export function Contact() {
  const { register, handleSubmit, formState: { errors }, reset } = useForm<ContactFormData>();
  const [isSubmitting, setIsSubmitting] = useState(false);
  const [heroVisible, setHeroVisible] = useState(false);

  useEffect(() => {
    const t = setTimeout(() => setHeroVisible(true), 100);
    return () => clearTimeout(t);
  }, []);

  const onSubmit = async (data: ContactFormData) => {
    setIsSubmitting(true);
    await new Promise(resolve => setTimeout(resolve, 1500));
    toast.success("Message sent successfully! We'll get back to you soon.");
    reset();
    setIsSubmitting(false);
  };

  const branches = [
    { name: 'Main Branch',  address: '123 Main Street, Downtown',    phone: '(123) 456-7890', hours: 'Mon-Fri 9AM-5PM' },
    { name: 'North Branch', address: '456 North Avenue, Northside',   phone: '(123) 456-7891', hours: 'Mon-Sat 9AM-4PM' },
    { name: 'South Branch', address: '789 South Road, Southside',     phone: '(123) 456-7892', hours: 'Mon-Fri 10AM-6PM' },
  ];

  return (
    <div className="flex flex-col">

      {/* ── Hero ── */}
      <section className="relative text-white py-24 sm:py-36 overflow-hidden">
        <div
          className="absolute inset-0 bg-[url('/src/images/bghd.jpg')] bg-cover bg-center"
          style={{ transition: 'transform 20s linear', transform: heroVisible ? 'scale(1)' : 'scale(1.05)' }}
        />
        <div className="absolute inset-0 bg-gradient-to-br from-black/70 via-primary/60 to-black/70" />
        <div className="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="max-w-3xl">
            <Badge className="mb-4 bg-white/20 text-white border-white/30 backdrop-blur-sm">Get in Touch</Badge>
            <h1 className="text-5xl sm:text-6xl font-bold mb-6 leading-tight">Contact Us</h1>
            <p className="text-xl text-blue-100 leading-relaxed">
              Have questions? We're here to help. Reach out to us through any of our channels.
            </p>
          </div>
        </div>
      </section>

      {/* ── Contact Info Cards ── */}
      <section className="relative py-20 sm:py-28 overflow-hidden">
        <div className="absolute inset-0 bg-[url('/src/images/bghd.jpg')] bg-cover bg-center opacity-5" />
        <div className="absolute inset-0 bg-background/95" />
        <div className="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            {[
              { icon: Phone,  gradient: 'from-blue-500 to-blue-600',   title: 'Phone',   sub: 'Call us anytime',        info: '(123) 456-7890' },
              { icon: Mail,   gradient: 'from-purple-500 to-purple-600', title: 'Email',  sub: 'Send us a message',      info: 'info@community-coop.com' },
              { icon: MapPin, gradient: 'from-green-500 to-green-600',  title: 'Address', sub: 'Visit our main branch',  info: '123 Main Street' },
              { icon: Clock,  gradient: 'from-orange-500 to-orange-600',title: 'Hours',   sub: "We're open",             info: 'Mon-Fri 9AM-5PM' },
            ].map((item, i) => (
              <Card key={i} className="rounded-2xl border-border/50 hover:shadow-lg transition-all duration-300 hover:-translate-y-1 bg-card/90 backdrop-blur-sm">
                <CardContent className="p-6 text-center">
                  <div className={`w-14 h-14 rounded-xl bg-gradient-to-br ${item.gradient} flex items-center justify-center mb-4 shadow-lg mx-auto`}>
                    <item.icon className="w-7 h-7 text-white" />
                  </div>
                  <h3 className="font-semibold mb-1">{item.title}</h3>
                  <p className="text-sm text-muted-foreground">{item.sub}</p>
                  <p className="text-sm font-medium mt-2">{item.info}</p>
                </CardContent>
              </Card>
            ))}
          </div>
        </div>
      </section>

      {/* ── Contact Form & Map ── */}
      <section className="relative py-20 sm:py-28 overflow-hidden">
        <div className="absolute inset-0 bg-[url('/src/images/bghd.jpg')] bg-cover bg-center" />
        <div className="absolute inset-0 bg-black/75" />
        <div className="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid lg:grid-cols-2 gap-8">

            {/* Contact Form */}
            <Card className="rounded-2xl bg-white/10 border-white/20 backdrop-blur-md text-white">
              <CardHeader>
                <CardTitle className="text-white">Send us a Message</CardTitle>
                <p className="text-sm text-white/65">
                  Fill out the form below and we'll get back to you within 24 hours.
                </p>
              </CardHeader>
              <CardContent>
                <form onSubmit={handleSubmit(onSubmit)} className="space-y-5">
                  {[
                    { id: 'name',    label: 'Full Name',      type: 'text',  placeholder: 'Juan dela Cruz',        key: 'name' as const },
                    { id: 'email',   label: 'Email Address',  type: 'email', placeholder: 'juan@example.com',      key: 'email' as const },
                    { id: 'subject', label: 'Subject',        type: 'text',  placeholder: 'How can we help?',      key: 'subject' as const },
                  ].map((field) => (
                    <div key={field.id} className="space-y-2">
                      <Label htmlFor={field.id} className="text-white/90">{field.label}</Label>
                      <Input
                        id={field.id}
                        type={field.type}
                        {...register(field.key, { required: true })}
                        className="rounded-lg bg-white/10 border-white/20 text-white placeholder:text-white/40 focus:border-white/50"
                        placeholder={field.placeholder}
                      />
                      {errors[field.key] && <span className="text-sm text-red-400">Required</span>}
                    </div>
                  ))}

                  <div className="space-y-2">
                    <Label htmlFor="message" className="text-white/90">Message</Label>
                    <Textarea
                      id="message"
                      {...register('message', { required: true })}
                      className="rounded-lg bg-white/10 border-white/20 text-white placeholder:text-white/40 focus:border-white/50"
                      rows={5}
                      placeholder="Tell us more about your inquiry..."
                    />
                    {errors.message && <span className="text-sm text-red-400">Required</span>}
                  </div>

                  <Button
                    type="submit"
                    className="w-full rounded-lg bg-white text-primary hover:bg-blue-50 font-bold shadow-lg"
                    disabled={isSubmitting}
                  >
                    {isSubmitting ? 'Sending...' : (<><Send className="w-4 h-4 mr-2" />Send Message</>)}
                  </Button>
                </form>
              </CardContent>
            </Card>

            {/* Map & Social */}
            <div className="space-y-6">
              <Card className="rounded-2xl overflow-hidden bg-white/10 border-white/20 backdrop-blur-md">
                <div className="h-72">
                  <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.2412634994903!2d-73.98784368459395!3d40.74844097932847!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259a9b3117469%3A0xd134e199a405a163!2sEmpire%20State%20Building!5e0!3m2!1sen!2sus!4v1645564123456!5m2!1sen!2sus"
                    width="100%" height="100%"
                    style={{ border: 0 }} allowFullScreen loading="lazy"
                  />
                </div>
              </Card>

              <Card className="rounded-2xl bg-white/10 border-white/20 backdrop-blur-md">
                <CardHeader>
                  <CardTitle className="text-white">Connect With Us</CardTitle>
                  <p className="text-sm text-white/65">Follow us on social media for updates and news</p>
                </CardHeader>
                <CardContent>
                  <div className="flex gap-3">
                    {[Facebook, Twitter, Instagram, Linkedin].map((Icon, i) => (
                      <Button key={i} variant="outline" size="icon" className="rounded-lg bg-white/10 border-white/20 text-white hover:bg-white/20">
                        <Icon className="w-5 h-5" />
                      </Button>
                    ))}
                  </div>
                </CardContent>
              </Card>
            </div>
          </div>
        </div>
      </section>

      {/* ── Branch Locator ── */}
      <section className="relative py-20 sm:py-28 overflow-hidden">
        <div className="absolute inset-0 bg-[url('/src/images/bghd.jpg')] bg-cover bg-center opacity-5" />
        <div className="absolute inset-0 bg-background/95" />
        <div className="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <h2 className="text-3xl sm:text-4xl font-bold mb-10 text-center">Our Branches</h2>
          <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
            {branches.map((branch, index) => (
              <Card key={index} className="rounded-2xl border-border/50 bg-card/90 backdrop-blur-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                <CardHeader>
                  <CardTitle className="flex items-center gap-2">
                    <MapPin className="w-5 h-5 text-primary" />
                    {branch.name}
                  </CardTitle>
                </CardHeader>
                <CardContent className="space-y-3 text-sm">
                  <div className="flex items-start gap-2">
                    <MapPin className="w-4 h-4 text-muted-foreground mt-0.5" />
                    <span className="text-muted-foreground">{branch.address}</span>
                  </div>
                  <div className="flex items-start gap-2">
                    <Phone className="w-4 h-4 text-muted-foreground mt-0.5" />
                    <span className="text-muted-foreground">{branch.phone}</span>
                  </div>
                  <div className="flex items-start gap-2">
                    <Clock className="w-4 h-4 text-muted-foreground mt-0.5" />
                    <span className="text-muted-foreground">{branch.hours}</span>
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